<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Traits\ResponseTrait;
use App\Models\Project;
use App\Models\User;
use App\Models\UserType;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    use ResponseTrait;
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|string',
            'name' => 'required',
            'password' => 'required|min:8',
            'user_type' => 'required'
        ]);

        if ($validator->fails()) {
            // Return JSON response with validation errors
            return back()->withErrors($validator->messages());
        }

        $existingUser = User::where('email', $request->email)->first();
        if ($existingUser) {
            return redirect()->route('home')->withErrors(['email' => 'User already exists']);
        }

        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'user_type' => $request->user_type
        ]);

        // Authenticate the user after registration
        Auth::login($user);

        if ($request->user_type == 'designer') {
            return redirect()->route('dashboard.index');
        } else {
            return redirect()->route('dashboard.overview');
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication successful
            if(auth()->user()->user_type == 'designer') {
                return redirect()->intended('/dashboard');
            } else {
                return redirect()->intended('/dashboard-overview');
            }

        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function userTypes()
    {
        $userTypes = UserTypeEnum::cases();
        return $this->okResponse('User Types', array_slice($userTypes, 1));
    }

    public function redirectToGoogle()
    {
        try {
            return Socialite::driver('google')->redirect();
        } catch (\Throwable $th) {
            Log::info($th->getTraceAsString());
        }
    }

    public function handleGoogleCallback(Request $request)
    {
        $user = Socialite::driver('google')->stateless()->user();

        $userExists = User::where('email', $user['email'])->exists();

        if (!$userExists) {
            return redirect()->route('home')->withErrors(['email' => 'User not found']);
        }

        return redirect()->intended('/dashboard');
    }

    public function handleFigmaCallback(Request $request)
    {
        $loggedInUser = auth()->user();
        $user = Socialite::driver('figma')->user();
        $project = Project::where('user_id', $loggedInUser->id)->latest()->first();
        $dateTime = Carbon::now()->addSeconds($user->expiresIn);
        $project->figma_expire_time = $dateTime;
        $project->figma_token = $user->token;
        $project->save();
        $loggedInUser->figma_expire_time = $dateTime;
        $loggedInUser->figma_token = $user->token;
        $loggedInUser->save();

        return redirect()->intended('/dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

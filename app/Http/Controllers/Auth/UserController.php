<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Traits\ResponseTrait;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use ResponseTrait;
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|string',
            'password' => 'required|min:8',
            'user_type' => 'required'
        ]);
        $existingUser = User::where('email', $request->email)->first();
        if ($existingUser) {
            $this->badRequestResponse('User already exists');
        }

        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_type' => $request->user_type
        ]);

        dd($user);

    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication successful
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function userTypes()
    {
        $userTypes = UserTypeEnum::cases();
        return $this->okResponse('User Types', array_slice($userTypes, 1));
    }
}

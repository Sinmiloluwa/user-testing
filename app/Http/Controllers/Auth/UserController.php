<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Traits\ResponseTrait;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ResponseTrait;
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|string',
            'password' => 'required|min:8',
            'user_type_id' => 'required'
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
    }

    public function userTypes()
    {
        $userTypes = UserTypeEnum::cases();
        return $this->okResponse('User Types', $userTypes);
    }
}

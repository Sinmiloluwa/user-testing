<?php

use App\Http\Controllers\Auth\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->group( function (){
   Route::get('user-types', [UserController::class, 'userTypes']);
   Route::post('register', [UserController::class, 'register']);
});

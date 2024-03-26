<?php

use App\Enums\UserTypeEnum;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    $data = UserTypeEnum::cases();
    $userTypes = array_slice($data, 1);
    return view('welcome', compact('userTypes'));
});
Route::post('login', [UserController::class, 'login'])->name('login');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

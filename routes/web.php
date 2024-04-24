<?php

use App\Enums\UserTypeEnum;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\userType;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    $data = UserTypeEnum::cases();
    $userTypes = array_slice($data, 1);
    return view('welcome', compact('userTypes'));
})->name('home');

Route::post('login', [UserController::class, 'login'])->name('login');
Route::get('login', function() {
    $data = UserTypeEnum::cases();
    $userTypes = array_slice($data, 1);
    return view('welcome', compact('userTypes'));
})->name('login.view');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth',userType::class);
Route::get('/login-google', [UserController::class, 'redirectToGoogle'])->name('google.login');
Route::post('register', [UserController::class, 'register'])->name('register');
Route::get('login/google/callback', [UserController::class, 'handleGoogleCallback']);
Route::get('callback/figma', [UserController::class, 'handleFigmaCallback']);
Route::get('countries', [DashboardController::class, 'getCountries']);
Route::post('create-project', [DashboardController::class, 'createProject'])->name('create-project')->middleware('auth');
Route::get('dashboard-overview', [DashboardController::class, 'overview'])->name('dashboard.overview')->middleware('auth', userType::class);
Route::post('submit-review', [DashboardController::class, 'review'])->middleware('auth')->name('review');
Route::post('delete-project', [DashboardController::class, 'deleteProject'])->name('project.delete');
Route::get('view-project/{id}', [DashboardController::class, 'viewProject'])->name('project.view')->middleware('auth');
Route::get('figma-file', [DashboardController::class, 'getEmbed']);
Route::get('view-prototype/{id}', [DashboardController::class, 'viewProto'])->name('open-figma')->middleware('auth');
Route::get('start-prototype', [DashboardController::class, 'startProto'])->name('open-prototype');
Route::post('check-link', [DashboardController::class, 'getEmbed'])->name('check.link');
Route::post('logout', [UserController::class, 'logout'])->name('logout');
Route::post('submit-answer', [DashboardController::class, 'submitAnswer'])->name('submit.answer');
Route::get('submit-project', function () {
    return view('submit-project');
})->name('project.submit');
Route::get('404', function () {
    return view('404');
});
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

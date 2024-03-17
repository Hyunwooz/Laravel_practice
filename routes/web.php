<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WithdrawController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ChangePasswordController;




Route::get('/', function () {
    return view('home');
});

Route::get('/withdraw', [WithdrawController::class, 'showWithdrawForm'])->name('withdraw');
Route::post('/withdraw', [WithdrawController::class, 'withdraw']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/mypage', [MypageController::class, 'showMypageForm'])->name('mypage');
Route::post('/mypage', [MypageController::class, 'update']);

Route::get('/changepassword', [ChangePasswordController::class, 'showChangePasswordForm'])->name('changepassword');
Route::post('/changepassword', [ChangePasswordController::class, 'changePassword']);
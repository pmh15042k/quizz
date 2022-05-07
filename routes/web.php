<?php

use App\Http\Controllers\Admin\TopicAdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Client
Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login/store', [UserController::class, 'store'])->name('login.store');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/user/store', [UserController::class, 'create'])->name('user.store');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/change-password', [UserController::class, 'updatePass'])->name('user.changePassword');
    Route::put('/users', [UserController::class, 'update'])->name('users.update');
    Route::post('/user/updateAvatar', [UserController::class, 'updateAvatar']);
    Route::post('/upload/services', [UploadController::class, 'store']);
    Route::post('/upload/remove', [UploadController::class, 'remove']);
    Route::get('/topic', [TopicController::class, 'index'])->name('member.topic');
    Route::get('/admin/topic', [TopicAdminController::class, 'index'])->name('admin.topic');
});

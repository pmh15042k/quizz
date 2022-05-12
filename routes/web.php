<?php

use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\QuizzCategoryController;
use App\Http\Controllers\Admin\TopicAdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TestQuizController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Question\Question;

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
    Route::prefix('admin')->group(function () {
        Route::get('/topic', [TopicAdminController::class, 'index'])->name('admin.topic');
        Route::post('/add-topic', [TopicAdminController::class, 'createTopic']);
        Route::put('/update-topic', [TopicAdminController::class, 'update']);

        Route::get('/add-category', [TopicAdminController::class, 'createCategory'])->name('admin.addCategory');
        Route::post('/add-category', [TopicAdminController::class, 'storeCategory']);
        Route::get('/getcategory/{id}', [TopicAdminController::class, 'getChildrenTopic']);
        Route::get('/category/{id}/delete', [TopicAdminController::class, 'delete']);

        Route::get('/listQuizTest/{id}', [QuizzCategoryController::class, 'show']);
        Route::get('/QuizTest/{id}', [QuizzCategoryController::class, 'get']);

        Route::get('/ListQuizTest/{id}', [QuizzCategoryController::class, 'getQuestion']);
        Route::post('/add-quizcategory', [QuizzCategoryController::class, 'store']);
        Route::put('/update-quizcategory', [QuizzCategoryController::class, 'update']);
        Route::get('/add-quizcategory', [QuizzCategoryController::class, 'index']);
        Route::get('/quizcategory/{id}/delete', [QuizzCategoryController::class, 'delete']);

        Route::get('/add-question/{id}', [QuestionController::class, 'create']);
        Route::post('/add-question', [QuestionController::class, 'store']);
        Route::get('/question/{id}/delete', [QuestionController::class, 'delete']);
        Route::get('/QuestionByQuiz/{id}', [QuestionController::class, 'getQuestionByQuiz']);

        Route::post('/add-option', [OptionController::class, 'store']);
        Route::get('/get-option/{id}', [OptionController::class, 'getByQuestion']);
    });
});

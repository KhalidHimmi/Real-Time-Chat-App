<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ForgotPasswordController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['verify' => true]);

Route::get('/', [App\Http\Controllers\ChatController::class, 'index'])->name('chat');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/setting', [App\Http\Controllers\SettingController::class, 'index'])->name('setting');
Route::get('/image',[App\Http\Controllers\SettingController::class, 'showChangePhotoGet'])->name('changePhotoGet');
Route::post('/image',[App\Http\Controllers\SettingController::class, 'upload'])->name('changePhotoPost');

Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('users');

//Post & Get Messages
Route::get('/message', [App\Http\Controllers\MessageController::class, 'index'])->name('message');
Route::post('/message', [App\Http\Controllers\MessageController::class, 'store'])->name('message');
// Route::post('/message', 'MessageController@store')->name('message.store');


//Change Pass
Route::get('/changePassword', [App\Http\Controllers\HomeController::class, 'showChangePasswordGet'])->name('changePasswordGet');
Route::post('/changePassword', [App\Http\Controllers\HomeController::class, 'changePasswordPost'])->name('changePasswordPost');



//Pass forgotten
// Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
// Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
// Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
// Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
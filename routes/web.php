<?php

use App\Http\Controllers\Admin\Admin;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[UserAuthController::class,'loginShow'])->name('user.login.show');
Route::post('/login',[UserAuthController::class,'login'])->name('user.login');
Route::get('/logout',[UserAuthController::class,'logout'])->name('user.logout');

Route::get('/register',[UserController::class,'showRegister'])->name('user.register.show');
Route::post('/register',[UserController::class,'register'])->name('user.register');
Route::group(['middleware'=>'userAuth'],function (){
    Route::get('/contact-create',[ContactController::class,'showContact'])->name('user.contact.show')->middleware('userAuth');
    Route::POST('/contact-create',[ContactController::class,'contact'])->name('user.contact');
    Route::get('/contact-create/{id}/update',[ContactController::class,'showUpdate'])->name('user.contact.update.show');
    Route::POST('/contact-create/{id}/update',[ContactController::class,'update'])->name('user.contact.update');
    Route::get('/contact/{id}/delete',[ContactController::class,'delete'])->name('user.contact.delete');
});

Route::get('admin/login',[Admin::class,'showLogin']);
Route::post('admin/login',[Admin::class,'login']);

Route::get('admin/dashboard',function (){
    return view('adminDashboard');
});

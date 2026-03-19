<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\AdminMiddleware;


// --------------this is for home-------------------//
Route::get('/admin-dashboard',[AdminController::class,'dasboard'])->name('get.dashboard')->middleware('admin');

// ---------------this is for category-----------------------//
Route::get('/category-form',[AdminController::class,'addCategory'])->name('get.category.form')->middleware('admin');
Route::post('/store-categorey',[AdminController::class,'storeCategory'])->name('post.category')->middleware('admin');
Route::get('/category-table',[AdminController::class,'categoryTable'])->name('get.category.table')->middleware('admin');

// ----------------for the product----------------//
Route::get('/product-form',[AdminController::class,'addProduct'])->name('get.product.form')->middleware('admin');
Route::post('/store-product',[AdminController::class,'storeProduct'])->name('post.product')->middleware('admin');
Route::get('/detail/{product}',[UserController::class,'detail'])->name('get.detail');

// ============login // logout===================//
Route::get('/login-page',[AuthController::class,'loginPage'])->name('get.login.page');
Route::get('/logout-page',[AuthController::class,'logOut'])->name('get.logout');
Route::post('/post-login',[AuthController::class,'login'])->name('post.login');

// =================Register user =========================//
Route::get('/register-form',[UserController::class,'register'])->name('get.register');
Route::post('/post-register',[UserController::class,'storeUser'])->name('post.register');

// ==========================front tamplate=====================//
Route::get('/',[UserController::class,'front'])->name('get.front');

// ====================hero section====================//
Route::get('/hero-form',[AdminController::class,'hero'])->name('get.hero.form')->middleware('admin');
Route::post('post-heroes',[AdminController::class,'storeHeroes'])->name('post.heroes')->middleware('admin');
Route::get('/hero-table',[AdminController::class,'heroTable'])->name('get.hero.table')->middleware('admin');
Route::get('/hero-edit/{hero}',[AdminController::class,'editHero'])->name('get.edit.hero')->middleware('admin');
Route::post('/update-hero/{hero}',[AdminController::class,'updateHero'])->name('post.update.hero')->middleware('admin');

// -------------------profile-----------------------//
Route::get('/profile',[UserController::class,'profile'])->name('get.profile')->middleware('user');

// ----------------------for password--------------------------/
Route::get('/password',[AuthController::class,'forgotPassword'])->name('get.forgot.password');
Route::get('/reset-password',[AuthController::class,'resetPassword'])->name('get.reset.password');
Route::post('/otp-reset-password',[AuthController::class,'newPassword'])->name('post.otp.password');
Route::post('/new-password',[AuthController::class,'updatePassword'])->name('post.new.password');

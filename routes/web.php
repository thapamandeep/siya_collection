<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\AdminMiddleware;


// --------------this is for home-------------------//
Route::get('/admin-dashboard',[AdminController::class,'dasboard'])->name('get.dashboard')->middleware('admin');

// ---------------this is for category-----------------------//
Route::get('/category-form',[AdminController::class,'addCategory'])->name('get.category.form')->middleware('admin');
Route::post('/store-categorey',[AdminController::class,'storeCategory'])->name('post.category')->middleware('admin');
Route::get('/category-table',[AdminController::class,'categoryTable'])->name('get.category.table')->middleware('admin');
Route::get('/edit-category/{category}',[AdminController::class,'editCategory'])->name('get.edit.category')->middleware('admin');
Route::post('update-category/{category}',[AdminController::class,'updateCategory'])->name('post.update.category')->middleware('admin');

// ----------------for the product----------------//
Route::get('/product-form',[AdminController::class,'addProduct'])->name('get.product.form')->middleware('admin');
Route::post('/store-product',[AdminController::class,'storeProduct'])->name('post.product')->middleware('admin');
Route::get('/product-index',[AdminController::class,'productindex'])->name('get.product.index')->middleware('admin');
Route::get('/edit-product/{product}',[AdminController::class,'editProduct'])->name('get.edit.product')->middleware('admin');
Route::post('/update-product/{product}',[AdminController::class,'updateProduct'])->name('post.update.product')->middleware('admin');
Route::get('delete-prroduct/{product}',[AdminController::class,'productDelete'])->name('get.delete.product')->middleware('admin');
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
Route::get('/edit-prrofile/{profile}',[UserController::class,'editProfile'])->name('get.edit.profile')->middleware('user');

// ----------------------for password--------------------------/
Route::get('/password',[AuthController::class,'forgotPassword'])->name('get.forgot.password');
Route::get('/reset-password',[AuthController::class,'resetPassword'])->name('get.reset.password');
Route::post('/otp-reset-password',[AuthController::class,'newPassword'])->name('post.otp.password');
Route::post('/new-password',[AuthController::class,'updatePassword'])->name('post.new.password');

// ------------------------forr carts-----------------------//
Route::post('/add-carts/{product}',[CartController::class,'addCart'])->name('post.add.cart')->middleware('user');
Route::get('/cart-show',[CartController::class,'showcart'])->name('get.show.cart')->middleware('user');
Route::get('/cart/delete/{cart}',[CartController::class,'deleteCart'])->name('get.delete.cart')->middleware('user');
Route::post('/purchase',[CartController::class,'purchase'])->name('post.purchase')->middleware('user');


// -----------------------for order----------------------------//
Route::get('/all-orders',[AdminController::class,'orderIndex'])->name('get.all.orders')->middleware('admin');
  Route::get('/orders-processing/{userId}', [OrderController::class,'markUserProcessing'])->name('order.processing.user')->middleware('admin');
  Route::get('/orders-shipping/{userId}', [OrderController::class,'markUserShipping'])->name('order.shipping.user')->middleware('admin');
  Route::get('/orders-delivered/{userId}', [OrderController::class,'markUserDelivered'])->name('order.delivered.user')->middleware('admin');
  Route::get('/my-order',[OrderController::class,'myOrder'])->name('get.my.order')->middleware('user');

  // ---------------------for about us -----------------------------//
  Route::get('/about-us',[UserController::class,'aboutUs'])->name('get.about.us');
  Route::get('/aboutUs-form',[AdminController::class,'aboutForm'])->name('get.about.form')->middleware('admin');
  Route::post('store-about',[AdminController::class,'storeAbout'])->name('post.about.us')->middleware('admin');
  Route::get('index-about',[AdminController::class,'indexAbout'])->name('get.index.about')->middleware('admin');
  Route::get('edit-about/{about}',[AdminController::class,'editAbout'])->name('get.edit.about')->middleware('admin');
  Route::post('update-about/{about}',[AdminController::class,'updateAbout'])->name('post.update.about')->middleware('admin');

  // ----------------------for contact us -------------------------//
  Route::get('/contact-us',[UserController::class,'contactUs'])->name('get.contact.us')->middleware('user');
  Route::post('contact-store',[AuthController::class,'ContactStore'])->name('post.contact.us')->middleware('user');

  // -------------------------------for product review----------------------------//
  Route::get('/product-review/{product}',[OrderController::class,'review'])->name('get.product.review')->middleware('user');
  Route::post('store-review/{product}',[OrderController::class,'storeReview'])->name('post.product.review')->middleware('user');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Models\Product;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
//Frontened Route
Route::get('/',[IndexController::class,'home'])->name('front');
Route::get('product-category/{slug}',[IndexController::class,'productCategory'])->name('product.category');
Route::get('product-detail/{slug}',[IndexController::class,'productDetail'])->name('product.detail');
Route::get('user/auth',[IndexController::class,'userAuth'])->name('user.auth');
Route::post('user/login',[IndexController::class,'loginSubmit'])->name('login.submit');
Route::post('user/register',[IndexController::class,'registerSubmit'])->name('register');
Route::get('user/logout',[IndexController::class,'userLogout'])->name('user.logout');
//Cart
Route::get('cart',[CartController::class,'cart'])->name('cart');
Route::post('cart/store',[CartController::class,'cartStore'])->name('cart.store');
Route::post('cart/delete',[CartController::class,'cartDelete'])->name('cart.delete');
Route::post('cart/update',[CartController::class,'cartUpdate'])->name('cart.update');
Route::post('cart/add',[CartController::class,'couponAdd'])->name('coupon.add');
//Wishlist
Route::get('wishlist',[WishlistController::class,'wishlist'])->name('wishlist');
Route::post('wishlist/add',[WishlistController::class,'wishlistStore'])->name('wishlist.store');
Route::post('wishlist/move-to-cart',[WishlistController::class,'moveToCart'])->name('wishlist.move.cart');
Route::post('wishlist/delete',[WishlistController::class,'wishlistDelete'])->name('wishlist.delete');
//CheckOut
Route::get('checkout1',[CheckoutController::class,'checkout1'])->name('checkout1')->middleware('user');
Route::get('checkout2',[CheckoutController::class,'checkout2'])->name('checkout2');
Route::post('checkout-first',[CheckoutController::class,'checkout1Store'])->name('checkout1.store');
Route::post('checkout-two',[CheckoutController::class,'checkout2Store'])->name('checkout2.store');
Route::post('checkout',[CheckoutController::class,'checkoutStore'])->name('checkout.store');
Route::get('complete/{order}',[CheckoutController::class,'complete'])->name('complete');

//shop
Route::get('shop',[IndexController::class,'shop'])->name('shop');
Route::post('shop-filter',[IndexController::class,'shopFilter'])->name('shop.filter');







//Backened Route

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix'=>'admin/','middleware'=>['auth','admin']],function(){
    Route::get('/',[AdminController::class,'admin'])->name('admin');
    Route::resource('/banner',BannerController::class);
    Route::resource('/category',CategoryController::class);
    Route::post('/category/{id}/child',[CategoryController::class,'getChildByParentId']);
    Route::resource('/brand',BrandController::class);
    Route::resource('/product',ProductController::class);
    Route::resource('/user',UserController::class);
    Route::resource('/coupon',CouponController::class);
    Route::resource('/shipping',ShippingController::class);

});
Route::group(['prefix'=>'seller/','middleware'=>['auth','seller']],function(){
    Route::get('/',[AdminController::class,'admin'])->name('seller');
});


//User Dashboard

Route::group(['prefix'=>'user'],function(){
    Route::get('/dashboard',[IndexController::class,'userDashboard'])->name('user.dashboard');
    Route::get('/order',[IndexController::class,'userOrder'])->name('user.order');
    Route::get('/track',[IndexController::class,'userTrack'])->name('user.trackorder');
    Route::get('/address',[IndexController::class,'userAddress'])->name('user.address');
    Route::get('/detail',[IndexController::class,'userAccount'])->name('user.account');
    Route::post('/billing/address/{id}',[IndexController::class,'billingAdddress'])->name('billing.address');
    Route::post('/shipping/address/{id}',[IndexController::class,'shippingAdddress'])->name('shipping.address');
    Route::post('/uodate/account/{id}',[IndexController::class,'updateAccount'])->name('update.account');
    

});




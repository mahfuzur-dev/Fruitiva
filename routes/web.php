<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerLoginController;
use App\Http\Controllers\CustomerRegisterController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GithubController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;




Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/',[FrontendController::class,'home'])->name('frontend');
Route::get('/product/details/{product_slug}',[FrontendController::class,'product_details'])->name('product.details');
Route::post('/getsize',[FrontendController::class,'getsize']);
Route::get('/cart',[FrontendController::class,'cart'])->name('cart');
Route::get('/checkout',[FrontendController::class,'checkout'])->name('checkout');
Route::get('/account',[FrontendController::class,'account'])->name('account');
Route::get('/shop',[FrontendController::class,'shop'])->name('shop');


//User
Route::get('/users',[UserController::class, 'users'])->name('users');
Route::get('/users/delete/{user_id}',[UserController::class, 'user_delete'])->name('users.delete');
Route::get('/profile',[UserController::class, 'profile'])->name('profile');
Route::post('/profile/name/change',[UserController::class, 'update_name'])->name('update.name');
Route::post('/profile/change/password',[UserController::class, 'change_password'])->name('change.password');
Route::post('/profile/photo',[UserController::class, 'profile_photo'])->name('profile.photo');

//Category
Route::get('/category',[CategoryController::class,'category'])->name('category');
Route::post('/add/category',[CategoryController::class,'add_category'])->name('add.category');
Route::get('/delete/category/{category_id}',[CategoryController::class,'delete_category'])->name('delete.category');
Route::get('/edit/category/{category_id}',[CategoryController::class,'edit_category'])->name('edit.category');
Route::post('/update/category',[CategoryController::class,'update_category'])->name('update.category');

//Sub-Category
Route::get('/subcategory',[SubCategoryController::class,'subcategory'])->name('sub_category');
Route::post('/add/subcategory',[SubCategoryController::class,'add_subcategory'])->name('add.subcategory');
Route::get('/delete/subcategory/{sub_category_id}',[SubCategoryController::class,'delete_subcategory'])->name('delete.sub_category');

//Product 
Route::get('/product',[ProductController::class,'product'])->name('product');
Route::post('/getsubcategory',[ProductController::class,'getsubcategory']);
Route::post('/add/product',[ProductController::class,'add_product'])->name('add.product');
Route::get('/view/product',[ProductController::class,'view_product'])->name('view.product');
Route::get('/view/product/{product_id}',[ProductController::class,'delete_product'])->name('delete.product');
Route::get('/color/size',[ProductController::class,'color_size'])->name('color.size');
Route::post('/add/color',[ProductController::class,'add_color'])->name('add.color');
Route::get('/delete/color/{color_id}',[ProductController::class,'delete_color'])->name('delete.color');
Route::post('/add/size',[ProductController::class,'add_size'])->name('add.size');
Route::get('/delete/size/{size_id}',[ProductController::class,'delete_size'])->name('delete.size');
Route::get('/inventory/{prodcut_id}',[ProductController::class,'inventory'])->name('inventory');
Route::post('/add/inventory',[ProductController::class,'add_inventory'])->name('add.inventory');
Route::get('/delete/inventory/{inventory_id}',[ProductController::class,'delete_inventory'])->name('delete.inventory');

//Coupon
Route::get('/coupon',[CouponController::class,'coupon'])->name('coupon');
Route::post('/coupon/store',[CouponController::class,'coupon_store'])->name('add.coupon');
Route::get('/coupon/delete/{coupon_id}',[CouponController::class,'coupon_delete'])->name('delete.coupon');

// Customer Register
Route::get('/customer/register',[CustomerRegisterController::class,'customer_register'])->name('customer.register');
Route::post('/add/customer/register',[CustomerRegisterController::class,'add_customer_register'])->name('add.register');
Route::get('/customer/login',[CustomerLoginController::class,'customer_login'])->name('customer.login');
Route::post('/store/customer/login',[CustomerLoginController::class,'customer_login_store'])->name('customer.login.store');
Route::get('/customer/logout',[CustomerLoginController::class,'customer_logout'])->name('customer.logout');

//Customer
Route::get('/invoice/download/{order_id}',[CustomerController::class,'invoice'])->name('invoice');

// Cart
Route::post('/cart/store',[CartController::class,'cart_store'])->name('cart.store');
Route::get('/cart/remove/{cart_id}',[CartController::class,'remove_cart'])->name('remove.cart');
Route::post('/cart/update',[CartController::class,'update_cart'])->name('update.cart');

//Checkout
Route::post('/getcity',[CheckoutController::class,'getcity']);
Route::post('/order/store',[CheckoutController::class,'order_store'])->name('order.store');
Route::get('/order/success',[CheckoutController::class,'order_success'])->name('order.success');

// SSLCOMMERZ Start
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);


Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


// Review
Route::post('/review',[CustomerController::class,'review'])->name('review');

//Password Reset
Route::get('/password/reset',[CustomerController::class,'password_reset_request_form'])->name('password.reset.request.form');
Route::post('/password/reset/send',[CustomerController::class,'pass_reset_send'])->name('pass_reset.send');
Route::get('/password/reset/form/{reset_token}',[CustomerController::class,'pass_reset_form'])->name('pass.reset.form');
Route::post('/customer/password/reset/',[CustomerController::class,'customer_reset_password'])->name('customer.reset.password');

//Email Verify
Route::get('/email/verify/{verify_token}',[CustomerController::class,'verify_email'])->name('verify.email');

//Github Login
Route::get('/github/redirect',[GithubController::class,'redirect_provider']);
Route::get('/github/callback',[GithubController::class,'provider_to_application']);
//Google Login
Route::get('/google/redirect',[GoogleController::class,'redirect_provider']);
Route::get('/google/callback',[GoogleController::class,'provider_to_application']);
//Facebook Login
Route::get('/facebook/redirect',[FacebookController::class,'redirect_provider']);
Route::get('/facebook/callback',[FacebookController::class,'provider_to_application']);

//Order 
Route::get('/orders',[OrderController::class,'orders'])->name('orders');
Route::post('/orders/status',[OrderController::class,'orders_status'])->name('order.status');
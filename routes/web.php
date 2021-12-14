<?php

use App\Http\Controllers\FacebookController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\SocialProviderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\MollieController;


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


/// Frontend ///

// Mollie Payment Gateway
Route::post('mollie-payment',[MollieController::Class,'preparePayment'])->name('mollie.payment');
Route::get('payment-success',[MollieController::Class, 'paymentSuccess'])->name('payment.success');

// Socialite login
Route::get('auth/{driver}', [SocialProviderController::class, 'redirectToProvider'])->name('login.social');
Route::get('auth/{driver}/callback', [SocialProviderController::class, 'handleProviderCallback']);

// Facebook login
Route::get('login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);

// Frontend pages
//Route::get('/', 'App\Http\Controllers\FrontendController@home')->name('home');
//Route::get('/shop', 'App\Http\Controllers\FrontendController@shop')->name('shop');
//Route::get('/productPage/{slug}', 'App\Http\Controllers\FrontendController@productpage')->name('productpage');
//Route::get('/about', 'App\Http\Controllers\FrontendController@about')->name('about');
//Route::get('/contact', 'App\Http\Controllers\FrontendController@contact')->name('contact');
//Route::get('/blog', 'App\Http\Controllers\FrontendController@blog')->name('blog');
//Route::get('/post/{slug}', 'App\Http\Controllers\FrontendController@post')->name('post');

// General routes
Route::get('/promo/selector/{id}', 'App\Http\Controllers\FrontendController@promo_selector')->name('productsPerPromo');
Route::get('/loginpage', [App\Http\Controllers\LoginController::class, 'index'])->name('loginpage');
Route::get('/products/brand/{slug}', 'App\Http\Controllers\FrontendController@productsPerBrand')->name('products-Per-Brand');
Route::get('/products/category/{slug}', 'App\Http\Controllers\FrontendController@productsPerCategory')->name('products-Per-Category');
Route::post('/contact/', 'App\Http\Controllers\ContactController@store');


// Shopping (cart)
Route::get('/addToCart/{id}','App\Http\Controllers\FrontendController@addToCart')->name('addToCart');
Route::get('/checkout/', 'App\Http\Controllers\FrontendController@checkout')->name('checkout');



// Wish List
Route::get('/addToList/{id}','App\Http\Controllers\FrontendController@addToList')->name('addToList');
Route::get('/wishlist/', 'App\Http\Controllers\FrontendController@list')->name('wishlist');
Route::get('/removeItemList/{id}','App\Http\Controllers\FrontendController@removeItemList')->name('removeItemList');

// Coupon
Route::post('/discount/', 'App\Http\Controllers\AdminCouponController@Coupon');


// General settings
Auth::routes(['verify'=> true]);

/// Backend ///

// Admin
Route::group(['prefix'=>'admin', 'middleware'=>[ 'auth']], function(){
    Route::get('restore/{user}', 'App\Http\Controllers\AdminUsersController@userRestore')->name('admin.userRestore');
    Route::get('archives', 'App\Http\Controllers\AdminUsersController@userArchive')->name('users.archives');
    Route::resource('roles', App\Http\Controllers\AdminRolesController::class);
    Route::resource('coupons', App\Http\Controllers\AdminCouponController::class);
    Route::get('restore/role/{role}', 'App\Http\Controllers\AdminRolesController@roleRestore')->name('admin.roleRestore');
    Route::resource('products', App\Http\Controllers\AdminProductsController::class);
    Route::get('admin/products/brand/{id}', 'App\Http\Controllers\AdminProductsController@productsPerBrand')->name('admin.productsPerBrand');
    Route::get('admin/products/productcategory/{id}', 'App\Http\Controllers\AdminProductsController@productsPerCategory')->name('admin.productsPerCategory');
    Route::get('restore/product/{product}', 'App\Http\Controllers\AdminProductsController@productRestore')->name('admin.productRestore');
    Route::resource('brands', App\Http\Controllers\AdminBrandsController::class);
    Route::get('restore/brand/{brand}', 'App\Http\Controllers\AdminBrandsController@brandRestore')->name('admin.brandRestore');
    Route::resource('productcategories', App\Http\Controllers\AdminProductCategory::class);
    Route::get('restore/productcategory/{productcategory}', 'App\Http\Controllers\AdminProductCategory@productcategoryRestore')->name('admin.productcategoryRestore');
    Route::resource('productsubcategories', App\Http\Controllers\AdminProductSubcategory::class);
    Route::get('restore/productsubcategory/{productsubcategory}', 'App\Http\Controllers\AdminProductSubcategory@productsubcategoryRestore')->name('admin.productsubcategoryRestore');
    Route::get('restore/orderdetail/{orderdetail}', 'App\Http\Controllers\AdminOrderdetailsController@orderdetailsRestore')->name('admin.orderdetailsRestore');
    Route::get('restore/address/{address}', 'App\Http\Controllers\AdminAddressesController@addressRestore')->name('admin.addressRestore');
    Route::resource('/prospects', App\Http\Controllers\AdminProspectsController::class);
    Route::get('/product/colors', 'App\Http\Controllers\AdminProductColorsController@index')->name('admin.product.colors');
    Route::resource('/newsletters', App\Http\Controllers\AdminNewslettersController::class);
    Route::post('/newsletter/send', 'App\Http\Controllers\AdminNewslettersController@newsletter_send_email')->name('newsletter_send_email');
    Route::get('/newsletters/restore/{id}', 'App\Http\Controllers\AdminNewslettersController@newsletterRestore')->name('admin.newsletterRestore');
    Route::resource('/faqs', App\Http\Controllers\AdminFAQSController::class);
    Route::get('faqs/restore/{id}', 'App\Http\Controllers\AdminFAQSController@FAQRestore')->name('admin.FAQRestore');
    Route::resource('posts', App\Http\Controllers\AdminPostsController::class);
    Route::get('restore/postcategory/{id}', 'App\Http\Controllers\AdminPostCategoriesController@postsCategoryRestore')->name('admin.postsCategoryRestore');
    Route::post('post/date', 'App\Http\Controllers\AdminPostsController@datePost')->name('admin.datePost');
    Route::post('post/publish', 'App\Http\Controllers\AdminPostsController@publishPost')->name('admin.publishPost');
    Route::post('post/delete', 'App\Http\Controllers\AdminPostsController@deleteBooking');
    Route::get('/post/{id}', 'App\Http\Controllers\AdminPostsController@post')->name('Post');
    Route::get('restore/post/{id}', 'App\Http\Controllers\AdminPostsController@postsRestore')->name('admin.postsRestore');
    Route::resource('postcategories', App\Http\Controllers\AdminPostCategoriesController::class);
    Route::get('restore/order/{order}', 'App\Http\Controllers\AdminOrdersController@ordersRestore')->name('admin.ordersRestore');

    Route::post('newsletter', 'App\Http\Controllers\AdminReadersController@store');
    Route::resource('/readers', App\Http\Controllers\AdminReadersController::class);
});

// Backend Customer
Route::group(['prefix'=>'admin', 'middleware'=>['auth']], function(){
    Route::resource('backend', App\Http\Controllers\BackendController::class);
    Route::delete('backend/destroy/photo/{id}', 'App\Http\Controllers\BackendController@destroyPhoto');
    Route::post('backend/search', 'App\Http\Controllers\BackendController@search_item');
    Route::resource('projects', App\Http\Controllers\AdminProjectController::class);

    Route::resource('keys', App\Http\Controllers\KeyController::class);
    Route::post('keys/search', 'App\Http\Controllers\KeyController@search_item');

    Route::resource('frontend', App\Http\Controllers\FrontendController::class);
    Route::delete('frontend/destroy/photo/{id}', 'App\Http\Controllers\FrontendController@destroyPhoto');
    Route::post('frontend/search', 'App\Http\Controllers\FrontendController@search_item');

    Route::resource('general', App\Http\Controllers\GeneralController::class);
    Route::delete('general/destroy/photo/{id}', 'App\Http\Controllers\GeneralController@destroyPhoto');
    Route::post('general/search', 'App\Http\Controllers\GeneralController@search_item');

    Route::resource('server', App\Http\Controllers\ServerController::class);
    Route::delete('server/destroy/photo/{id}', 'App\Http\Controllers\ServerController@destroyPhoto');
    Route::post('server/search', 'App\Http\Controllers\ServerController@search_item');

    Route::resource('users', App\Http\Controllers\AdminUsersController::class);
    Route::resource('orderdetails', App\Http\Controllers\AdminOrderdetailsController::class);
    Route::resource('addresses', App\Http\Controllers\AdminAddressesController::class);
    Route::get('/', [App\Http\Controllers\AdminHomeController::class, 'index'])->name('admin.home');
    // Orders
    Route::resource('orders', App\Http\Controllers\AdminOrdersController::class);
    Route::get('finish/order/{id}', 'App\Http\Controllers\AdminOrdersController@Finish')->name('order.finish');
    Route::get('finished/orders', 'App\Http\Controllers\AdminOrdersController@index_finished')->name('complete.orders');
    Route::post('orderDate', 'App\Http\Controllers\AdminOrdersController@OrderDate');
    Route::post('orderDate/finished', 'App\Http\Controllers\AdminOrdersController@OrderDateFinished');
    Route::post('search/product', 'App\Http\Controllers\AdminProductsController@search_item');
    Route::post('search/order', 'App\Http\Controllers\AdminOrdersController@search_item');
    // Reviews
    Route::resource('/reviews', App\Http\Controllers\AdminReviewsController::class);
    Route::get('restore/review/{review}', 'App\Http\Controllers\AdminReviewsController@reviewRestore')->name('admin.reviewRestore');
    Route::resource('/reviewreplies', App\Http\Controllers\AdminReviewRepliesController::class);
    Route::get('restore/reviewreply/{reviewreply}', 'App\Http\Controllers\AdminReviewRepliesController@reviewreplyRestore')->name('admin.reviewreplyRestore');
});


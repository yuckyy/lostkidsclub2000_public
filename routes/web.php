<?php



use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Middleware\AdminMiddleware;

$lang = Session::get('lang');
if(!$lang){
    Session::put('lang','en');
}

Route::get('/', function () {

    return view('index');
});

Route::get('/en', function () {
    Session::put('lang','en');
    return back();
//    redirect('/');
});
Route::get('/ua', function () {
    Session::put('lang','ua');
    return back();
});

Route::get('/contacts', function () {

    return view('erd-paris');
});

Route::get('/legal', function () {

    return view('legal');
});

Route::get('/missing_presentation2024', function () {

    return view('collection');
});

Route::get('/product/{?}', function () {

    return view('erd-paris');
});

Route::get('/shop/{cat_id?}', 'App\Http\Controllers\ShopController@shop', );
Route::get('/load-more-products', 'App\Http\Controllers\ShopController@loadMoreProducts');

Route::get('/products/{product}', 'App\Http\Controllers\ProductController@product', );

Route::get('/shop', 'App\Http\Controllers\ShopController@shop',)->name('shop');


//#cart
Route::post('/cart/add', 'App\Http\Controllers\CartController@addToCart')->name('cart.add');
Route::get('/cart', 'App\Http\Controllers\CartController@showCart')->name('cart.view');
Route::post('/cart/remove', 'App\Http\Controllers\CartController@removeProduct')->name('cart.remove');
Route::post('/cart/remove_all', 'App\Http\Controllers\CartController@removeAll')->name('cart.remove.all');
Route::get('/cart/count', 'App\Http\Controllers\CartController@getCartCount')->name('cart.count');
//#cart

//#checkout
Route::group(['prefix' => 'checkout'], function () {
    Route::get('/', 'App\Http\Controllers\CheckoutController@checkout');
    Route::post('/createorder', 'App\Http\Controllers\CheckoutController@createorder');
});
//#checkout
Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', 'App\Http\Controllers\AdminController@dashboard')->name('admin.dashboard');
    Route::get('/admin/product', 'App\Http\Controllers\AdminController@products')->name('admin.product');

    Route::post('/admin/store', 'App\Http\Controllers\AdminController@store')->name('products.store');
    Route::post('/admin/update/{id}', 'App\Http\Controllers\AdminController@update')->name('products.update');
    Route::post('/admin/delete/{id}', 'App\Http\Controllers\AdminController@destroy')->name('products.destroy');

    Route::get('/admin', 'App\Http\Controllers\AdminController@dashboard')->name('admin');
});

Route::get('/admin/login', 'App\Http\Controllers\AdminAuthController@showLoginForm')->name('admin.login.form');
Route::post('/admin/login', 'App\Http\Controllers\AdminAuthController@login')->name('admin.login');
Route::post('/admin/logout', 'App\Http\Controllers\AdminAuthController@logout')->name('admin.logout');


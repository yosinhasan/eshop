<?php

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/products', 'HomeController@products');
    Route::post('/products', 'HomeController@products');
    Route::get('/product/{id}', 'HomeController@product')->where('id', '[0-9]+');
    Route::get('/contact', 'HomeController@contact');
    Route::get('/about', 'HomeController@about');


    Route::get('/addtocart', 'CartController@add');
    Route::post('/updatecart', 'CartController@update');
    Route::get('/deleteitem', 'CartController@delete');
    Route::get('/cart', 'CartController@index');
    Route::get('/checkout', 'CartController@checkout');

    Route::get('locale/{lang}', 'HomeController@language')->where('lang', '[A-Za-z_-]+');


    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');
    Route::get('auth/confirm/{token}', 'Auth\AuthController@getConfirm');
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');
});
Route::group(array('prefix' => 'admin', 'middleware' => 'manager'), function () {
    Route::get('/', 'HomeController@index');
    Route::get('users', 'UserController@index');
});

//Route::get('/{lang}', function($lang) {
//    $changeLocale = new \App\Jobs\ChangeLocale;
//    $lang = in_array($lang, config('app.languages')) ? $lang : config('app.fallback_locale');
//    $changeLocale->lang = $lang;
//    app(Illuminate\Contracts\Bus\Dispatcher::class)->dispatch($changeLocale);
//    return redirect()->back();
//});

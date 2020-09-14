<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'IndexController@index')->name('frontend.index');

//商品頁
Route::get('merchandise/{sortId}', 'IndexController@merchandise')->name('frontend.product.index');
Route::get('product/{productId}', 'IndexController@product')->name('frontend.product.detail');

Route::get('blog', 'IndexController@blog')->name('frontend.blog');

Route::get('order', 'IndexController@order')->name('frontend.order');

Route::get('contact', 'IndexController@contact')->name('frontend.contact');

//購物車
Route::group(['prefix' => 'cart'], function () {
    Route::get('/', 'CartController@cart')->name('frontend.cart.cart');
    //ajax
    Route::post('addItemToCart', 'CartController@addItemToCart');
    Route::post('updateQuantity', 'CartController@updateQuantity');
    Route::post('deleteItemInCart', 'CartController@deleteItemInCart');
});

//結帳
Route::group(['prefix' => 'checkout'], function () {
    Route::get('/', 'OrderController@checkout')->name('frontend.order.checkout');
    Route::post('send', 'OrderController@sendCheckout')->name('frontend.order.sendCheckout');
    Route::prefix('ecpay')->group(function () {
        //當消費者付款完成後，綠界會將付款結果參數以幕後(Server POST)回傳到該網址。
        Route::post('notify', 'OrderController@notifyUrl')->name('notify');
        //付款完成後，綠界會將付款結果參數以幕前(Client POST)回傳到該網址
        Route::post('return', 'OrderController@returnUrl')->name('return');
    });
    Route::get('confirmation', 'OrderController@confirmation')->name('frontend.order.confirmation');
});




// Route::prefix('admin')->middleware(['auth'])->group(function () {
//     Route::get('/', 'AdminController@index')->name('admin.dashboard');

// });



Route::group(['prefix' => 'admin'], function () {
    Route::get('', 'AdminController@index')->name('admin.dashboard');

    //banner
    Route::group(['prefix' => 'banner'], function () {
        Route::get('list', "BannerController@index")->name("banner.list");
        Route::get('create', "BannerController@create")->name("banner.create");
        Route::post('store', "BannerController@store")->name("banner.store");
        Route::get('edit/{bannerId}', "BannerController@edit")->name("banner.edit");
        Route::put('update/{bannerId}', "BannerController@update")->name("banner.update");
        Route::put('update/rank/{bannerId}', 'BannerController@updateRank')->name('banner.rank.update');
        Route::put('update_by_check', 'BannerController@updateByCheck')->name('banner.check.update');
        Route::delete('delete/{bannerId}', "BannerController@destroy")->name("banner.destroy");
    });

    //商品
    Route::group(['prefix' => 'merchandise'], function () {

        //商品
        Route::group(['prefix' => 'product'], function () {
            Route::get('list', "ProductController@index")->name("merchandise.product.list");
            Route::get('list/{sortId}', "ProductController@sortIndex")->name("merchandise.product.sort.list");
            Route::get('create', "ProductController@create")->name("merchandise.product.create");
            Route::post('store', "ProductController@store")->name("merchandise.product.store");
            Route::get('edit/{productId}', "ProductController@edit")->name("merchandise.product.edit");
            Route::put('update/{productId}', "ProductController@update")->name("merchandise.product.update");
            Route::put('update/rank/{productId}', 'ProductController@updateRank')->name('merchandise.product.rank.update');
            Route::put('update_by_check', 'ProductController@updateByCheck')->name('merchandise.product.check.update');
            Route::delete('delete/{productId}', "ProductController@destroy")->name("merchandise.product.destroy");
        });

        //商品類別
        Route::group(['prefix' => 'sort'], function () {
            Route::get('list', "SortController@index")->name("merchandise.sort.list");
            Route::get('create', "SortController@create")->name("merchandise.sort.create");
            Route::post('store', "SortController@store")->name("merchandise.sort.store");
            Route::get('edit/{sortId}', "SortController@edit")->name("merchandise.sort.edit");
            Route::put('update/{sortId}', "SortController@update")->name("merchandise.sort.update");
            // Route::put('update/rank/{sortId}', 'SortController@updateRank')->name('merchandise.sort.rank.update');
            // Route::put('update_by_check', 'SortController@updateByCheck')->name('merchandise.sort.check.update');
            Route::delete('delete/{sortId}', "SortController@destroy")->name("merchandise.sort.destroy");
        });
    });

    //blog
    Route::group(['prefix' => 'blog'], function () {

        //類別
        Route::group(['prefix' => 'catagory'], function () {
            Route::get('list', "CatagoryController@index")->name("blog.catagory.list");
            Route::get('create', "CatagoryController@create")->name("blog.catagory.create");
            Route::post('store', "CatagoryController@store")->name("blog.catagory.store");
            Route::get('edit/{catagoryId}', "CatagoryController@edit")->name("blog.catagory.edit");
            Route::put('update/{catagoryId}', "CatagoryController@update")->name("blog.catagory.update");
            Route::put('update/rank/{catagoryId}', 'CatagoryController@updateRank')->name('blog.catagory.rank.update');
            Route::put('update_by_check', 'CatagoryController@updateByCheck')->name('blog.catagory.check.update');
            Route::delete('delete/{catagoryId}', "CatagoryController@destroy")->name("blog.catagory.destroy");
        });

        //tag
        Route::group(['prefix' => 'tag'], function () {
            Route::get('list', "TagController@index")->name("blog.tag.list");
            Route::get('create', "TagController@create")->name("blog.tag.create");
            Route::post('store', "TagController@store")->name("blog.tag.store");
            Route::get('edit/{tagId}', "TagController@edit")->name("blog.tag.edit");
            Route::put('update/{tagId}', "TagController@update")->name("blog.tag.update");
            Route::put('update/rank/{tagId}', 'TagController@updateRank')->name('blog.tag.rank.update');
            Route::put('update_by_check', 'TagController@updateByCheck')->name('blog.tag.check.update');
            Route::delete('delete/{tagId}', "TagController@destroy")->name("blog.tag.destroy");
        });

        //文章
        Route::group(['prefix' => 'article'], function () {
            Route::get('list', "ArticleController@index")->name("blog.article.list");
            Route::get('create', "ArticleController@create")->name("blog.article.create");
            Route::post('store', "ArticleController@store")->name("blog.article.store");
            Route::get('edit/{articleId}', "ArticleController@edit")->name("blog.article.edit");
            Route::put('update/{articleId}', "ArticleController@update")->name("blog.article.update");
            Route::put('update/rank/{articleId}', 'ArticleController@updateRank')->name('blog.article.rank.update');
            Route::put('update_by_check', 'ArticleController@updateByCheck')->name('blog.article.check.update');
            Route::delete('delete/{articleId}', "ArticleController@destroy")->name("blog.article.destroy");
        });
    });

    //mail
    Route::group(['prefix' => 'mail'], function () {

        Route::get('create', "MailController@create")->name("mail.create");
        Route::post('store', "MailController@store")->name("mail.store");
        Route::get('edit/{mailId}', "MailController@edit")->name("mail.edit");
        Route::put('update/{mailId}', "MailController@update")->name("mail.update");
        Route::put('update/rank/{mailId}', 'MailController@updateRank')->name('mail.rank.update');
        Route::put('update_by_check', 'MailController@updateByCheck')->name('mail.check.update');
        Route::delete('delete/{mailId}', "MailController@destroy")->name("mail.destroy");
    });
});

//ajax
Route::POST('/delete/picture', "ProductController@deletePicture");


Route::get('/test', "TestController@index");

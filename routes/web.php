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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



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
        Route::delete('delete/{bannerId}', "BannerController@delete")->name("banner.delete");
    });

      //商品
      Route::group(['prefix' => 'merchandise'], function () {

        //商品
        Route::group(['prefix' => 'product'], function () {
            Route::get('list', "ProductController@index")->name("merchandise.product.list");
            Route::get('create', "ProductController@create")->name("merchandise.product.create");
            Route::post('store', "ProductController@store")->name("merchandise.product.store");
            Route::get('edit/{productId}', "ProductController@edit")->name("merchandise.product.edit");
            Route::put('update/{productId}', "ProductController@update")->name("merchandise.product.update");
            Route::put('update/rank/{productId}', 'ProductController@updateRank')->name('merchandise.product.rank.update');
            Route::put('update_by_check', 'ProductController@updateByCheck')->name('merchandise.product.check.update');
            Route::delete('delete/{productId}', "ProductController@delete")->name("merchandise.product.delete");
        });

        //商品照片
        Route::group(['prefix' => 'picture'], function () {
            Route::get('list', "PictureController@index")->name("merchandise.picture.list");
            Route::get('create', "PictureController@create")->name("merchandise.picture.create");
            Route::post('store', "PictureController@store")->name("merchandise.picture.store");
            Route::get('edit/{pictureId}', "PictureController@edit")->name("merchandise.picture.edit");
            Route::put('update/{pictureId}', "PictureController@update")->name("merchandise.picture.update");
            Route::put('update/rank/{pictureId}', 'PictureController@updateRank')->name('merchandise.picture.rank.update');
            Route::put('update_by_check', 'PictureController@updateByCheck')->name('merchandise.picture.check.update');
            Route::delete('delete/{pictureId}', "PictureController@delete")->name("merchandise.picture.delete");
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
            Route::delete('delete/{catagoryId}', "CatagoryController@delete")->name("blog.catagory.delete");
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
            Route::delete('delete/{tagId}', "TagController@delete")->name("blog.tag.delete");
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
            Route::delete('delete/{articleId}', "ArticleController@delete")->name("blog.article.delete");
        });
    });


});



Route::get('/test', function () {
    return view('test');
});

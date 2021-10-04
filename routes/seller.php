<?php

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

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Seller', 'prefix' => 'seller', 'as' => 'seller.'], function () {

    /*authentication*/
    Route::group(['namespace' => 'Auth', 'prefix' => 'auth', 'as' => 'auth.'], function () {
        Route::get('login', 'LoginController@login')->name('login');
        Route::post('login', 'LoginController@submit');
        Route::get('logout', 'LoginController@logout')->name('logout');
    });

    /*authenticated*/
    Route::group(['middleware' => ['seller']], function () {
        Route::get('dashboard', 'SystemController@dashboard')->name('dashboard');

        Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
            Route::post('image-upload', 'ProductController@imageUpload')->name('image-upload');
            Route::get('remove-image', 'ProductController@remove_image')->name('remove-image');
            Route::get('add-new', 'ProductController@add_new')->name('add-new');
            Route::post('add-new', 'ProductController@store');
            Route::post('status-update', 'ProductController@status_update')->name('status-update');
            Route::get('list', 'ProductController@list')->name('list');
            Route::get('edit/{id}', 'ProductController@edit')->name('edit');
            Route::post('update/{id}', 'ProductController@update')->name('update');
            Route::post('sku-combination', 'ProductController@sku_combination')->name('sku-combination');
            Route::get('get-categories', 'ProductController@get_categories')->name('get-categories');

            Route::delete('delete/{id}', 'ProductController@delete')->name('delete');

            Route::get('view/{id}', 'ProductController@view')->name('view');
        });

        Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
            Route::get('list/{status}', 'OrderController@list')->name('list');
            Route::get('details/{id}', 'OrderController@details')->name('details');
            Route::get('generate-invoice/{id}', 'OrderController@generate_invoice')->name('generate-invoice');
            Route::post('status', 'OrderController@status')->name('status');
            Route::post('productStatus', 'OrderController@productStatus')->name('productStatus');
        });
        //Product Reviews

        Route::group(['prefix' => 'reviews', 'as' => 'reviews.'], function () {
            Route::get('list', 'ReviewsController@list')->name('list');

        });

        Route::group(['prefix' => 'contest', 'as' => 'contest.'], function () {
            Route::get('listmanage/{id}', 'ContestController@listmanage')->name('listmanage');
            Route::get('list', 'ContestController@list')->name('list');
            Route::get('listjoin', 'ContestController@listjoin')->name('listjoin');
            Route::get('add', 'ContestController@add')->name('add');
            Route::post('addnew', 'ContestController@addnew')->name('addnew');
            Route::post('update', 'ContestController@update')->name('update');
            Route::get('remove_image_user/{id}', 'ContestController@remove_image_user')->name('remove_image_user');
            Route::get('remove_image_user2/{id}', 'ContestController@remove_image_user2')->name('remove_image_user2');
            Route::get('remove_image_user3/{id}', 'ContestController@remove_image_user3')->name('remove_image_user3');
            Route::get('remove_image/{id}', 'ContestController@remove_image')->name('remove_image');
            Route::get('detail/{id}', 'ContestController@detail')->name('detail');
            Route::get('edit/{id}', 'ContestController@edit')->name('edit');
            Route::get('delete/{id}', 'ContestController@delete')->name('delete');
			Route::post('join', 'ContestController@join')->name('join');
			Route::post('updatemanage', 'ContestController@updatemanage')->name('updatemanage');
        });
        Route::group(['prefix' => 'barter', 'as' => 'barter.'], function () {
            Route::post('updateproducts', 'BarterController@updateproducts')->name('updateproducts');
            Route::post('updatebarter', 'BarterController@updatebarter')->name('updatebarter');
            Route::post('editproductsell', 'BarterController@editproductsell')->name('editproductsell');
            Route::post('editproductbuy', 'BarterController@editproductbuy')->name('editproductbuy');
            Route::post('updateamountsell', 'BarterController@updateamountsell')->name('updateamountsell');
            Route::post('updateamountbuy', 'BarterController@updateamountbuy')->name('updateamountbuy');
            Route::get('deleteamountbarter/{id}', 'BarterController@deleteamountbarter')->name('deleteamountbarter');
            Route::get('deleteamountbuy/{id}', 'BarterController@deleteamountbuy')->name('deleteamountbuy');
            Route::get('deleteproductbarter/{id}', 'BarterController@deleteproductbarter')->name('deleteproductbarter');
            Route::get('deleteproductbuy/{id}', 'BarterController@deleteproductbuy')->name('deleteproductbuy');
            Route::get('remove_image_sell', 'BarterController@remove_image_sell')->name('remove_image_sell');
            Route::get('remove_image_buy', 'BarterController@remove_image_buy')->name('remove_image_buy');
            Route::get('listmanage/{id}', 'BarterController@listmanage')->name('listmanage');
            Route::get('list', 'BarterController@list')->name('list');
            Route::get('listjoin', 'BarterController@listjoin')->name('listjoin');
            Route::get('selleradd', 'BarterController@selleradd')->name('selleradd');
            Route::post('addnew', 'BarterController@addnew')->name('addnew');
            Route::get('detail/{id}', 'Contest2Controller@detail')->name('detail');
            Route::get('edit/{id}', 'BarterController@edit')->name('edit');
            Route::get('cart', 'BarterController@cart')->name('cart');
            Route::get('checkout/{id}', 'BarterController@checkout')->name('checkout');
            Route::get('orderlistsell', 'BarterController@orderlistsell')->name('orderlistsell');
            Route::get('orderlistbuy', 'BarterController@orderlistbuy')->name('orderlistbuy');
            Route::post('addtocart', 'BarterController@addtocart')->name('addtocart');
            Route::post('sell', 'BarterController@sell')->name('sell');
            Route::post('buy', 'BarterController@buy')->name('buy');
            Route::post('updateorderdeliverystatusseller', 'BarterController@updateorderdeliverystatusseller')->name('updateorderdeliverystatusseller');
            Route::post('updateorderdeliverystatus', 'BarterController@updateorderdeliverystatus')->name('updateorderdeliverystatus');
            Route::get('buydetail/{id}', 'BarterController@buydetail')->name('buydetail');
            Route::get('selldetail/{id}', 'BarterController@selldetail')->name('selldetail');
            Route::get('order/{id}', 'BarterController@order')->name('order');
            Route::get('delete/{id}', 'BarterController@delete')->name('delete');
        });
		
        Route::group(['prefix' => 'address', 'as' => 'address.'], function () {
            Route::get('defaultaddress/{id}', 'AddressController@defaultaddress')->name('defaultaddress');
            Route::get('edit/{id}', 'AddressController@edit')->name('edit');
            Route::get('delete/{id}', 'AddressController@delete')->name('delete');
			Route::get('list', 'AddressController@list')->name('list');
			Route::get('add', 'AddressController@add')->name('add');
			Route::post('addnew', 'AddressController@addnew')->name('addnew');
			Route::post('update', 'AddressController@update')->name('update');
        });
        Route::group(['prefix' => 'premium', 'as' => 'premium.'], function () {
            Route::get('update', 'PremiumController@update')->name('update');
            Route::get('success', 'PremiumController@success')->name('success');
            Route::get('premium', 'PremiumController@premium')->name('premium');
        });
        Route::group(['prefix' => 'saldo', 'as' => 'saldo.'], function () {
            Route::get('update', 'SaldoController@update')->name('update');
            Route::get('success', 'SaldoController@success')->name('success');
            Route::get('saldo', 'SaldoController@saldo')->name('saldo');
        });
        // Messaging
        Route::group(['prefix' => 'messages', 'as' => 'messages.'], function () {
            Route::get('/chat', 'ChattingController@chat')->name('chat');
            Route::get('/message-by-user', 'ChattingController@message_by_user')->name('message_by_user');
            Route::post('/seller-message-store', 'ChattingController@seller_message_store')->name('seller_message_store');
        });
        // profile

        Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
            Route::get('view', 'ProfileController@view')->name('view');
            Route::get('update/{id}', 'ProfileController@edit')->name('update');
            Route::post('update/{id}', 'ProfileController@update');
            Route::post('settings-password', 'ProfileController@settings_password_update')->name('settings-password');

            Route::get('bank-edit/{id}', 'ProfileController@bank_edit')->name('bankInfo');
            Route::post('bank-update/{id}', 'ProfileController@bank_update')->name('bank_update');

        });
        Route::group(['prefix' => 'shop', 'as' => 'shop.'], function () {
            Route::get('view', 'ShopController@view')->name('view');
            Route::get('edit/{id}', 'ShopController@edit')->name('edit');
            Route::post('update/{id}', 'ShopController@update')->name('update');
        });

        Route::group(['prefix' => 'withdraw', 'as' => 'withdraw.'], function () {
            Route::post('request', 'WithdrawController@w_request')->name('request');
            Route::delete('close/{id}', 'WithdrawController@close_request')->name('close');
        });

        Route::group(['prefix' => 'business-settings', 'as' => 'business-settings.'], function () {

            Route::group(['prefix' => 'shipping-method', 'as' => 'shipping-method.'], function () {
                Route::get('add', 'ShippingMethodController@index')->name('add');
                Route::post('add', 'ShippingMethodController@store');
                Route::get('edit/{id}', 'ShippingMethodController@edit')->name('edit');
                Route::put('update/{id}', 'ShippingMethodController@update')->name('update');
                Route::delete('delete/{id}', 'ShippingMethodController@delete')->name('delete');
                Route::post('status-update', 'ShippingMethodController@status_update')->name('status-update');
            });

        });
    });

});

<?php
Route::group(['namespace' => 'Front'], function () {
    Route::get('/','FrontController@homePage')->name('front.home-page');
    Route::get('/apply','FrontController@apply')->name('front.apply');
    Route::post('/submit-apply','FrontController@submitApply')->name('front.submitApply');
    Route::get('/apply-success','FrontController@submitApplySuccess')->name('front.submitApplySuccess');
    Route::get('/gioi-thieu','FrontController@abouts')->name('front.abouts');
    Route::get('/lien-he','FrontController@contact')->name('front.contact');
    Route::post('/postContact','FrontController@postContact')->name('front.submitContact');
    Route::get('/faq','FrontController@faq')->name('front.faq');








    Route::get('/posts/{slug?}','FrontController@blogs')->name('front.blogs');
    Route::get('/posts/tag/{slug}','FrontController@getPostByTag')->name('front.getPostByTag');
    Route::get('/get-post-by-cate','FrontController@getPostByCate')->name('front.getPostByCate');

    Route::get('/chinh-sach/{slug}','FrontController@getPolicy')->name('front.getPolicy');



    Route::get('/tim-kiem','FrontController@searchProduct')->name('front.searchProduct');


    // gio-hang
    Route::post('/posts/{postId}/add-post-to-cart','CartController@addItem')->name('cart.add.item');
    Route::get('/remove-post-to-cart','CartController@removeItem')->name('cart.remove.item');
    Route::get('/gio-hang','CartController@index')->name('cart.index');
    Route::post('/update-cart','CartController@updateItem')->name('cart.update.item');
    Route::get('/thanh-toan','CartController@checkout')->name('cart.checkout');
    Route::post('/checkout','CartController@checkoutSubmit')->name('cart.submit.order');
    Route::get('/dat-hang-thanh-cong.html','CartController@checkoutSuccess')->name('cart.checkout.success');
    Route::post('/apply-voucher','CartController@applyVoucher')->name('cart.apply.voucher');



    // love list
    Route::get('/san-pham-yeu-thich','WishListController@index')->name('love.add.index');
    Route::post('/{productId}/add-product-to-wishlist','WishListController@addItem')->name('love.add.item');
    Route::get('/remove-product-to-wishlist','WishListController@removeFromWishlist')->name('love.remove.item');
    Route::get('/clear-wishlist','WishListController@removeAll')->name('love.remove.allItem');


    Route::get('onlyme/clear', 'FrontController@clearData')->name('front.clearData');

    Route::get('/gg/online', [\App\Http\Controllers\Front\AnalyticsController::class, 'online'])->name('ga4.online');

    Route::get('/{any}', function () {
        // Laravel tự load view errors/404.blade.php khi abort(404)
        abort(404);
    })
        ->where('any', '.*');

});






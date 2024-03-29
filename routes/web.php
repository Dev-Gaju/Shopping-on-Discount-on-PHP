<?php

Auth::routes();
Route::get('/home', 'HomeController@index');

Route::Get('/', 'WelcomeController@index');
Route::Get('/category/{id}', 'WelcomeController@category');
Route::Get('/register', 'WelcomeController@register');
Route::Get('/wishlist', 'WelcomeController@wishlist');
Route::Get('/category-details/{id}', 'WelcomeController@categoryDetails');
Route::Get('/blog', 'WelcomeController@blog');
Route::Get('/category-description', 'WelcomeController@blogs_single');


Route::post('/add-to-cart', 'AddtocartController@addtoCart');
Route::get('/show-cart', 'AddtocartController@showCart');
Route::post('/update-cart-product', 'AddtocartController@updateCart');
Route::get('/delete-cart-product/{id}', 'AddtocartController@DeleteCart');



Route::get('/checkout', 'checkoutController@index');
Route::post('/new-customer', 'checkoutController@saveCustomerInfo');
Route::get('/shipping-info', 'checkoutController@shippingCustomerInfo');
Route::post('/logouts', 'checkoutController@customerLogout');
Route::post('/login-customer', 'checkoutController@loginCustomer');
Route::post('/new-shipping', 'checkoutController@saveShipping');
Route::get('/payment-info', 'checkoutController@showpaymentForm');
Route::post('/new-order', 'checkoutController@saveOrderInfo');


//password reset
Route::get('/password-update', 'Auth\ResetPasswordController@showResetForm');
Route::post('/password-email/{token}', 'Auth\ResetPasswordController@reset');
Route::get('/password-forget', 'Auth\ForgotPasswordController@showLinkRequestForm');


Route::get('/categori/add-categori', 'CategoryController@AddCategory');
Route::post('/category/add-newCategory', 'CategoryController@addNewCategory');
Route::get('/categori/manage-categori', 'CategoryController@ManageCategory')->middleware('AuthenicateMiddileware');
Route::get('/category/edit-category/{id}', 'CategoryController@editCategory');
Route::post('/category/updateCategory', 'CategoryController@UpdatCeategory');
Route::post('/category/delete-Category', 'CategoryController@deleteCategory');
Route::get('/category/unpublished-category/{id}', 'CategoryController@unpublishedCategory');
Route::get('/category/published-category/{id}', 'CategoryController@publishedCategory');







Route::get('/brand/add-brand', 'BrandController@addBrand');
Route::post('/brand/new-brand', 'BrandController@addNewBrand');
Route::get('/brand/manage-brand', 'BrandController@manageBrand')->middleware('AuthenicateMiddileware');
Route::get('/brand/edit-brand/{id}', 'BrandController@EditBrand');
Route::post('/brand/updateBrand', 'BrandController@updateBrand');
Route::post('/brand/delete-brand', 'BrandController@deleteBrand')->name('brand/delete-brand');
Route::get('/brand/unpublished-brand/{id}', 'BrandController@unpublishedBrand');
Route::get('/brand/published-brand/{id}', 'BrandController@publishedBrand');



Route::get('/product/add-product', 'ProductController@addProdct');
Route::post('/product/new-product', 'ProductController@saveProductInfo');
Route::get('/product/manage-product', 'ProductController@ManageProductInfo')->middleware('AuthenicateMiddileware');
Route::get('/product/edit-product/{id}', 'ProductController@editProductInfo');
Route::post('/product/update-product', 'ProductController@updateProductInfo');
Route::get('/product/published-product/{id}', 'ProductController@publishedProduct');
Route::get('/product/unpublished-product/{id}', 'ProductController@unpublishedProduct');
Route::post('/product/delete-product', 'ProductController@deleteProduct');
Route::get('product/productsCat', 'ProductController@GroupBY');



Route::get('/manage-order', 'OrderController@manageOrderInfo');
Route::get('/order/view-order/{id}', 'OrderController@ViewOrderInfo');
Route::get('/order/view-order-invoice/{id}', 'OrderController@ViewOrderInvoice');
Route::get('/order/edit-order/{id}', 'OrderController@editOrderInfo');
Route::post('/order/order-status', 'OrderController@updatenewOrderInfo');
Route::get('/order/delete-order/{id}', 'OrderController@deleteOrderInfo');

Route::get('/order/download-invoice/{id}', 'OrderController@invoiceDownload');

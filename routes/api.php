<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});


Route::namespace('App\Http\Controllers\Api\v2\outlet')->prefix("v2/outlet")->group(function () {
  Route::post('login', 'AuthController@login')->name('login');
  Route::post('logout', 'AuthController@logout')->name('logout');
  Route::post('order-list', 'OrderController@list');
  Route::post('order-details', 'OrderController@order_details');
  Route::post('forgot_password', 'AuthController@forgot_password');
  Route::post('reset_password', 'AuthController@reset_password')->name('vendor.reset_password');
  Route::post('resend_forgot_password_otp', 'AuthController@resend_forgot_password_otp');
  Route::post('my_profile', 'UsersController@my_profile')->name('my_profile');
  Route::post('profile_update', 'UsersController@update_user_profile');
  Route::post('order-change-status', 'OrderController@change_status');
  Route::post('create_order', 'OrderController@createOrder');
  Route::post('order_list', 'OrderController@orderList');
  Route::post('order_details', 'OrderController@orderDetails');
  Route::post('service_order_details', 'ServiceOrderController@service_order_details');
  Route::post('service-order-change-status', 'ServiceOrderController@service_change_status');
  Route::post('mute_order', 'OrderController@mute_order');
  Route::post('mute_service_order', 'ServiceOrderController@mute_service_order');
  Route::post('review_list', 'RatingController@review_list');
  Route::post('count_order', 'OrderController@count_order');
});


Route::namespace('App\Http\Controllers\Api\v2')->prefix("v2")->name("api.v2.")->group(function () {
  Route::post('used_coupons', 'HomeController@used_coupons')->name('used_coupons');
  Route::post('un_used_coupons', 'HomeController@un_used_coupons')->name('un_used_coupons');
  Route::get('/countries', 'CMS@countrylist')->name('countries');
  Route::post('home', 'HomeController@index')->name('home');
  Route::post('search', 'HomeController@search')->name('search');
  Route::post('slider', 'HomeController@slider')->name('slider');
  Route::post('category', 'HomeController@category')->name('category');
  Route::post('coupons', 'HomeController@coupons')->name('coupons');
  Route::post('coupons_details', 'HomeController@couponsDetails')->name('coupons_details');
  Route::post('acitivity_details', 'ActivityController@details')->name('acitivity.details');
  Route::post('vendors', 'VendorController@list')->name('vendor_list');
  Route::post('vendor_details', 'VendorController@details')->name('vendor_details');
  Route::post('store_details', 'HomeController@store_details')->name('coupons');
  Route::post('events', 'HomeController@events')->name('events');
  Route::post('events_details', 'HomeController@events_details')->name('events_details');
  

  Route::post('service_home', 'ServiceController@service_home')->name('service_home');
  Route::post('service_categories', 'ServiceController@service_categories')->name('service_categories');
  Route::post('service_categories_details', 'ServiceController@service_categories_details')->name('service_categories_details');
  Route::post('service_sub_categories', 'ServiceController@service_sub_categories');
  Route::post('service_list', 'ServiceController@servicelist');

  Route::post('service_categories_health', 'ServiceController@service_categories_health');
  Route::post('coupon_categories', 'CouponsModuleController@couponCategories')->name('service_categories');
  Route::post('coupon_categories_details', 'CouponsModuleController@couponCategoriesdetails');
  Route::post('coupon_details', 'CouponsModuleController@couponDetails');
  Route::post('offer_list', 'ServiceController@offer_list');
  Route::post('new_service_list', 'ServiceController@new_service_list');
  Route::post('most_booked_service', 'ServiceController@most_booked_service');
  Route::post('service_details', 'ServiceController@serviceDetails');
  Route::post('/my_service_orders', 'ServiceOrderController@my_service_orders');
  Route::post('/booked_slots', 'ServiceOrderController@booked_slots');
  Route::post('/my_service_order_details', 'ServiceOrderController@my_service_order_details');
  Route::post('favourites', 'UsersController@favourites')->name('favourites');
  Route::post('/my_profile', 'UsersController@my_profile')->name('my_profile');
  Route::post('like_dislike', 'UsersController@like_dislike')->name('like_dislike');
  Route::post('video_viewed', 'UsersController@video_viewed')->name('video_viewed');
  Route::post('video_downloaded', 'UsersController@video_downloaded')->name('video_downloaded');
  Route::post('video_downloaded_list', 'UsersController@video_downloaded_list')->name('video_downloaded_list');
  Route::post('send_notification', 'UsersController@send_notification')->name('send_notification');
  Route::post('notification_status', 'UsersController@notification_status')->name('notification_status');
  Route::post('rate', 'RatingController@add_rating')->name('rate');
  Route::post('/update_user_profile', 'UsersController@update_user_profile');
  Route::post('list_products', 'ProductController@list')->name('list_products');
  Route::post('product_filters', 'ProductController@product_filters')->name('product_filters');
  Route::post('product_details', 'ProductController@details')->name('product_details');
  Route::post('featured_product_details', 'ProductController@featured_product_details');
  Route::post('featured_service_details', 'ServiceController@featured_service_details');
  Route::post('add_to_cart', 'CartController@add_to_cart')->name('add_to_cart');
  Route::post('get_cart', 'CartController@get_cart')->name('get_cart');
  Route::post('update_cart', 'CartController@update_cart')->name('update_cart');
  Route::post('delete_cart', 'CartController@delete_cart')->name('delete_cart');
  Route::post('clear_cart', 'CartController@clear_cart')->name('clear_cart');
  Route::post('checkout', 'CartController@checkout')->name('checkout');
  Route::post('payment_init', 'CartController@payment_init')->name('payment_init');
  Route::get('/payment_response', 'CartController@payment_response');
  Route::get('/payment_cancel', 'CartController@payment_cancel');
  Route::post('/place_order', 'CartController@place_order');
  Route::post('/cancel_order', 'OrderController@cancel_order');
  Route::post('/refund_request', 'OrderController@refund_request');
  Route::post('booking_count', 'OrderController@bookingCount');
  Route::post('update_activity', 'OrderController@update_activity');
  Route::post('transport_list', 'TransportController@list');
  

  
  
  Route::post('/my_orders', 'OrderController@my_orders');
  Route::post('/my_order_details', 'OrderController@my_order_details');

  

  Route::post('/contracting', 'ContractingController@contracting');
  Route::post('/my_contracts', 'ContractingController@my_contracts');
  Route::post('/my_contract_details', 'ContractingController@my_contract_details');
  Route::post('/contract_satatus_change', 'ContractingController@contract_satatus_change');
  Route::post('/contract_payment_init', 'ContractingController@contract_payment_init');
  Route::post('/verify_contract_payment', 'ContractingController@verify_contract_payment');

  Route::post('/maintainance', 'MaintainanceController@maintainance');
  Route::post('/my_maintainance', 'MaintainanceController@my_maintainance');
  Route::post('/my_maintainance_details', 'MaintainanceController@my_maintainance_details');
  Route::post('/maintenance_change_status', 'MaintainanceController@maintenance_change_status');
  Route::post('/maintenance_payment_init', 'MaintainanceController@maintenance_payment_init');
  Route::post('/verify_maintenance_payment', 'MaintainanceController@verify_maintenance_payment');

  Route::post('/contract_maintainance_jobs', 'ContractingController@contract_maintainance_jobs');

  Route::post('/get_page', 'CMS@get_page');
  Route::post('/get_faq', 'CMS@get_faq');
  Route::post('/add_address', 'UsersController@add_address')->name('add_address');
  Route::post('/edit_address', 'UsersController@edit_address')->name('edit_address');
  Route::post('/delete_address', 'UsersController@delete_address')->name('delete_address');
  Route::post('/list_address', 'UsersController@list_address')->name('list_address');
  Route::post('/set_default', 'UsersController@setdefault')->name('set_default');
  Route::post('/apply_coupon', 'CartController@apply_coupon');
  Route::post('/wallet_payment_init', 'UsersController@wallet_payment_init');
  Route::post('/wallet_recharge', 'UsersController@wallet_recharge');
  Route::post('/wallet_details', 'UsersController@wallet_details');

  Route::post('get_service_cart', 'ServiceCartController@get_service_cart');
  Route::post('add_service_to_cart', 'ServiceCartController@add_service_to_cart');
  Route::post('add_service_to_cart_service_category_check', 'ServiceCartController@add_service_to_cart_service_category_check');
   Route::get('coupon_list', 'ServiceCartController@couponlist');
  Route::post('update_service_to_cart', 'ServiceCartController@update_service_to_cart');
  Route::post('delete_service_cart', 'ServiceCartController@delete_service_cart');
  Route::post('clear_service_cart', 'ServiceCartController@clear_service_cart');
  Route::post('service_checkout', 'ServiceCartController@service_checkout');
  Route::post('service_payment_init', 'ServiceCartController@service_payment_init');
  Route::post('service_place_order', 'ServiceCartController@service_place_order');
  Route::post('apply_service_coupon', 'ServiceCartController@apply_service_coupon');
  Route::post('service_cancel_order', 'ServiceOrderController@service_cancel_order');
  Route::post('service_type', 'ServiceController@service_type')->name('service_type');
  Route::post('time_slote', 'ServiceCartController@timeslote');


  Route::post('/notification/list', 'NotificationController@list')->name('notification.list');


  Route::post('/states', 'CMS@states')->name('states');
  Route::post('/cities', 'CMS@cities')->name('cities');
  Route::post('/areas', 'CMS@areas')->name('areas');
  Route::post('/submit_contact_us', 'CMS@submit_contact_us');
  Route::post('/contact_settings', 'CMS@contact_settings');


  Route::post('/get_tag_users', 'PostController@get_tag_users')->name('get_tag_users');

  Route::post('/view_profile', 'UsersController@view_profile')->name('view_profile');
  Route::post('/get_user_posts', 'PostController@get_user_posts')->name('get_user_posts');
  Route::post('/get_posts', 'PostController@get_posts')->name('get_posts');
  Route::post('/change_phone_number', 'UsersController@change_phone_number');
  Route::post('/validate_otp_phone_email_update', 'UsersController@validate_otp_phone_email_update');
  Route::post('/change_email', 'UsersController@change_email');
  Route::post('/change_password', 'UsersController@change_password');
  Route::post('rated_products', 'UsersController@listratedproducts');


  Route::post('/get_help', 'CMS@gethelp');
  Route::post('/save_unsave_post', 'PostController@save_unsave_post')->name('save_unsave_post');
  Route::post('/get_saved_posts', 'PostController@get_saved_posts')->name('get_saved_posts');
  Route::post('/remove_post', 'PostController@remove_post')->name('remove_post');














  Route::post('industry_types', 'StoreController@industry_types')->name('industry_types');


  Route::post('list_moda_products', 'ProductController@list_moda_products')->name('list_moda_products');
  Route::post('moda_categories', 'ModaController@moda_categories');
  Route::get('hair_colors', 'ModaController@hair_colors');
  Route::get('skin_colors', 'ModaController@skin_colors');

  Route::post('add_product_to_moda', 'ModaController@add_product_to_moda');
  Route::post('my_moda', 'ModaController@my_moda');
  Route::post('previous_moda_list', 'ModaController@previous_moda_list');
});

Route::namespace('App\Http\Controllers\Api\v1')->prefix("v1/auth")->name("api.v1.auth")->group(function () {
  Route::post('signup', 'AuthController@signup')->name('signup');
  Route::post('resend_code', 'AuthController@resend_code')->name('resend_code');
  Route::post('confirm_code', 'AuthController@confirm_code')->name('confirm_code');
  Route::post('email_login', 'AuthController@email_login')->name('email_login');
  Route::post('mobile_login', 'AuthController@mobile_login')->name('mobile_login');
  Route::post('social_login', 'AuthController@social_login')->name('social_login');

  Route::post('resend_phone_code', 'AuthController@resend_phone_code')->name('resend_phone_code');
  Route::post('confirm_phone_code', 'AuthController@confirm_phone_code')->name('confirm_phone_code');
  Route::post('delete_user', 'AuthController@delete_account')->name('delete_user');
  Route::post('get_user_by_token', 'AuthController@get_user_by_token')->name('get_user_by_token');
  Route::post('/forgot_password', 'AuthController@forgot_password');
  Route::post('/reset_password_otp_verify', 'AuthController@reset_password_otp_verify')->name('user.reset_password_otp_verify');
  Route::post('/reset_password', 'AuthController@reset_password')->name('user.reset_password');
  Route::post('/resend_forgot_password_otp', 'AuthController@resend_forgot_password_otp')->name('user.resend_forgot_password_otp');
  Route::post('logout', 'AuthController@logout')->name('logout');


  Route::post('get_mobile_otp', 'ChangeMobileController@get_mobile_otp')->name('get_mobile_otp');
  Route::post('resend_mobile_otp',  'ChangeMobileController@resend_mobile_otp')->name('resend_mobile_otp');
  Route::post('change_mobile', 'ChangeMobileController@change_mobile')->name('change_mobile');

});

Route::namespace('App\Http\Controllers\Api\v1\outlet')->prefix("v1/outlet")->group(function () {
  Route::post('login', 'AuthController@login')->name('login');
  Route::post('logout', 'AuthController@logout')->name('logout');
  Route::post('order-list', 'OrderController@list');
  Route::post('order-details', 'OrderController@order_details');
  Route::post('forgot_password', 'AuthController@forgot_password');
  Route::post('reset_password', 'AuthController@reset_password')->name('vendor.reset_password');
  Route::post('resend_forgot_password_otp', 'AuthController@resend_forgot_password_otp');
  Route::post('my_profile', 'UsersController@my_profile')->name('my_profile');
  Route::post('profile_update', 'UsersController@update_user_profile');
  Route::post('order-change-status', 'OrderController@change_status');
  Route::post('create_order', 'OrderController@createOrder');
  Route::post('order_list', 'OrderController@orderList');
  Route::post('order_details', 'OrderController@orderDetails');
  Route::post('service_order_details', 'ServiceOrderController@service_order_details');
  Route::post('service-order-change-status', 'ServiceOrderController@service_change_status');
  Route::post('mute_order', 'OrderController@mute_order');
  Route::post('mute_service_order', 'ServiceOrderController@mute_service_order');
  Route::post('review_list', 'RatingController@review_list');
  Route::post('count_order', 'OrderController@count_order');
});


Route::namespace('App\Http\Controllers\Api\v1')->prefix("v1")->name("api.v1.")->group(function () {
  Route::post('used_coupons', 'HomeController@used_coupons')->name('used_coupons');
  Route::post('un_used_coupons', 'HomeController@un_used_coupons')->name('un_used_coupons');
  Route::get('/countries', 'CMS@countrylist')->name('countries');
  Route::post('home', 'HomeController@index')->name('home');
  Route::post('search', 'HomeController@search')->name('search');
  Route::post('slider', 'HomeController@slider')->name('slider');
  Route::post('category', 'HomeController@category')->name('category');
  Route::post('coupons', 'HomeController@coupons')->name('coupons');
  Route::post('coupons_details', 'HomeController@couponsDetails')->name('coupons_details');
  Route::post('acitivity_details', 'ActivityController@details')->name('acitivity.details');
  Route::post('vendors', 'VendorController@list')->name('vendor_list');
  Route::post('vendor_details', 'VendorController@details')->name('vendor_details');
  Route::post('store_details', 'HomeController@store_details')->name('coupons');


  Route::post('service_home', 'ServiceController@service_home')->name('service_home');
  Route::post('service_categories', 'ServiceController@service_categories')->name('service_categories');
  Route::post('service_categories_details', 'ServiceController@service_categories_details')->name('service_categories_details');
  Route::post('service_sub_categories', 'ServiceController@service_sub_categories');
  Route::post('service_list', 'ServiceController@servicelist');

  Route::post('service_categories_health', 'ServiceController@service_categories_health');
  Route::post('coupon_categories', 'CouponsModuleController@couponCategories')->name('service_categories');
  Route::post('coupon_categories_details', 'CouponsModuleController@couponCategoriesdetails');
  Route::post('coupon_details', 'CouponsModuleController@couponDetails');
  Route::post('offer_list', 'ServiceController@offer_list');
  Route::post('new_service_list', 'ServiceController@new_service_list');
  Route::post('most_booked_service', 'ServiceController@most_booked_service');
  Route::post('service_details', 'ServiceController@serviceDetails');
  Route::post('/my_service_orders', 'ServiceOrderController@my_service_orders');
  Route::post('/booked_slots', 'ServiceOrderController@booked_slots');
  Route::post('/my_service_order_details', 'ServiceOrderController@my_service_order_details');
  Route::post('favourites', 'UsersController@favourites')->name('favourites');
  Route::post('/my_profile', 'UsersController@my_profile')->name('my_profile');
  Route::post('like_dislike', 'UsersController@like_dislike')->name('like_dislike');
  Route::post('video_viewed', 'UsersController@video_viewed')->name('video_viewed');
  Route::post('video_downloaded', 'UsersController@video_downloaded')->name('video_downloaded');
  Route::post('video_downloaded_list', 'UsersController@video_downloaded_list')->name('video_downloaded_list');
  Route::post('send_notification', 'UsersController@send_notification')->name('send_notification');
  Route::post('notification_status', 'UsersController@notification_status')->name('notification_status');
  Route::post('rate', 'RatingController@add_rating')->name('rate');
  Route::post('/update_user_profile', 'UsersController@update_user_profile');
  Route::post('list_products', 'ProductController@list')->name('list_products');
  Route::post('product_filters', 'ProductController@product_filters')->name('product_filters');
  Route::post('product_details', 'ProductController@details')->name('product_details');
  Route::post('featured_product_details', 'ProductController@featured_product_details');
  Route::post('featured_service_details', 'ServiceController@featured_service_details');
  Route::post('add_to_cart', 'CartController@add_to_cart')->name('add_to_cart');
  Route::post('get_cart', 'CartController@get_cart')->name('get_cart');
  Route::post('update_cart', 'CartController@update_cart')->name('update_cart');
  Route::post('delete_cart', 'CartController@delete_cart')->name('delete_cart');
  Route::post('clear_cart', 'CartController@clear_cart')->name('clear_cart');
  Route::post('checkout', 'CartController@checkout')->name('checkout');
  Route::post('payment_init', 'CartController@payment_init')->name('payment_init');
  Route::get('/payment_response', 'CartController@payment_response');
  Route::get('/payment_cancel', 'CartController@payment_cancel');
  Route::post('/place_order', 'CartController@place_order');
  Route::post('/cancel_order', 'OrderController@cancel_order');
  Route::post('/refund_request', 'OrderController@refund_request');
  Route::post('booking_count', 'OrderController@bookingCount');
  Route::post('update_activity', 'OrderController@update_activity');
  Route::post('transport_list', 'TransportController@list');
  

  
  
  Route::post('/my_orders', 'OrderController@my_orders');
  Route::post('/my_order_details', 'OrderController@my_order_details');

  

  Route::post('/contracting', 'ContractingController@contracting');
  Route::post('/my_contracts', 'ContractingController@my_contracts');
  Route::post('/my_contract_details', 'ContractingController@my_contract_details');
  Route::post('/contract_satatus_change', 'ContractingController@contract_satatus_change');
  Route::post('/contract_payment_init', 'ContractingController@contract_payment_init');
  Route::post('/verify_contract_payment', 'ContractingController@verify_contract_payment');

  Route::post('/maintainance', 'MaintainanceController@maintainance');
  Route::post('/my_maintainance', 'MaintainanceController@my_maintainance');
  Route::post('/my_maintainance_details', 'MaintainanceController@my_maintainance_details');
  Route::post('/maintenance_change_status', 'MaintainanceController@maintenance_change_status');
  Route::post('/maintenance_payment_init', 'MaintainanceController@maintenance_payment_init');
  Route::post('/verify_maintenance_payment', 'MaintainanceController@verify_maintenance_payment');

  Route::post('/contract_maintainance_jobs', 'ContractingController@contract_maintainance_jobs');

  Route::post('/get_page', 'CMS@get_page');
  Route::post('/get_faq', 'CMS@get_faq');
  Route::post('/add_address', 'UsersController@add_address')->name('add_address');
  Route::post('/edit_address', 'UsersController@edit_address')->name('edit_address');
  Route::post('/delete_address', 'UsersController@delete_address')->name('delete_address');
  Route::post('/list_address', 'UsersController@list_address')->name('list_address');
  Route::post('/set_default', 'UsersController@setdefault')->name('set_default');
  Route::post('/apply_coupon', 'CartController@apply_coupon');
  Route::post('/wallet_payment_init', 'UsersController@wallet_payment_init');
  Route::post('/wallet_recharge', 'UsersController@wallet_recharge');
  Route::post('/wallet_details', 'UsersController@wallet_details');

  Route::post('get_service_cart', 'ServiceCartController@get_service_cart');
  Route::post('add_service_to_cart', 'ServiceCartController@add_service_to_cart');
  Route::post('add_service_to_cart_service_category_check', 'ServiceCartController@add_service_to_cart_service_category_check');
   Route::get('coupon_list', 'ServiceCartController@couponlist');
  Route::post('update_service_to_cart', 'ServiceCartController@update_service_to_cart');
  Route::post('delete_service_cart', 'ServiceCartController@delete_service_cart');
  Route::post('clear_service_cart', 'ServiceCartController@clear_service_cart');
  Route::post('service_checkout', 'ServiceCartController@service_checkout');
  Route::post('service_payment_init', 'ServiceCartController@service_payment_init');
  Route::post('service_place_order', 'ServiceCartController@service_place_order');
  Route::post('apply_service_coupon', 'ServiceCartController@apply_service_coupon');
  Route::post('service_cancel_order', 'ServiceOrderController@service_cancel_order');
  Route::post('service_type', 'ServiceController@service_type')->name('service_type');
  Route::post('time_slote', 'ServiceCartController@timeslote');


  Route::post('/notification/list', 'NotificationController@list')->name('notification.list');


  Route::post('/states', 'CMS@states')->name('states');
  Route::post('/cities', 'CMS@cities')->name('cities');
  Route::post('/areas', 'CMS@areas')->name('areas');
  Route::post('/submit_contact_us', 'CMS@submit_contact_us');
  Route::post('/contact_settings', 'CMS@contact_settings');


  Route::post('/get_tag_users', 'PostController@get_tag_users')->name('get_tag_users');

  Route::post('/view_profile', 'UsersController@view_profile')->name('view_profile');
  Route::post('/get_user_posts', 'PostController@get_user_posts')->name('get_user_posts');
  Route::post('/get_posts', 'PostController@get_posts')->name('get_posts');
  Route::post('/change_phone_number', 'UsersController@change_phone_number');
  Route::post('/validate_otp_phone_email_update', 'UsersController@validate_otp_phone_email_update');
  Route::post('/change_email', 'UsersController@change_email');
  Route::post('/change_password', 'UsersController@change_password');
  Route::post('rated_products', 'UsersController@listratedproducts');


  Route::post('/get_help', 'CMS@gethelp');
  Route::post('/save_unsave_post', 'PostController@save_unsave_post')->name('save_unsave_post');
  Route::post('/get_saved_posts', 'PostController@get_saved_posts')->name('get_saved_posts');
  Route::post('/remove_post', 'PostController@remove_post')->name('remove_post');














  Route::post('industry_types', 'StoreController@industry_types')->name('industry_types');


  Route::post('list_moda_products', 'ProductController@list_moda_products')->name('list_moda_products');
  Route::post('moda_categories', 'ModaController@moda_categories');
  Route::get('hair_colors', 'ModaController@hair_colors');
  Route::get('skin_colors', 'ModaController@skin_colors');

  Route::post('add_product_to_moda', 'ModaController@add_product_to_moda');
  Route::post('my_moda', 'ModaController@my_moda');
  Route::post('previous_moda_list', 'ModaController@previous_moda_list');
});

Route::namespace('App\Http\Controllers\Api\v1')->prefix("v1/auth")->name("api.v1.auth")->group(function () {
  Route::post('signup', 'AuthController@signup')->name('signup');
  Route::post('resend_code', 'AuthController@resend_code')->name('resend_code');
  Route::post('confirm_code', 'AuthController@confirm_code')->name('confirm_code');
  Route::post('email_login', 'AuthController@email_login')->name('email_login');
  Route::post('mobile_login', 'AuthController@mobile_login')->name('mobile_login');
  Route::post('social_login', 'AuthController@social_login')->name('social_login');

  Route::post('resend_phone_code', 'AuthController@resend_phone_code')->name('resend_phone_code');
  Route::post('confirm_phone_code', 'AuthController@confirm_phone_code')->name('confirm_phone_code');
  Route::post('delete_user', 'AuthController@delete_account')->name('delete_user');
  Route::post('get_user_by_token', 'AuthController@get_user_by_token')->name('get_user_by_token');
  Route::post('/forgot_password', 'AuthController@forgot_password');
  Route::post('/reset_password_otp_verify', 'AuthController@reset_password_otp_verify')->name('user.reset_password_otp_verify');
  Route::post('/reset_password', 'AuthController@reset_password')->name('user.reset_password');
  Route::post('/resend_forgot_password_otp', 'AuthController@resend_forgot_password_otp')->name('user.resend_forgot_password_otp');
  Route::post('logout', 'AuthController@logout')->name('logout');


  Route::post('get_mobile_otp', 'ChangeMobileController@get_mobile_otp')->name('get_mobile_otp');
  Route::post('resend_mobile_otp',  'ChangeMobileController@resend_mobile_otp')->name('resend_mobile_otp');
  Route::post('change_mobile', 'ChangeMobileController@change_mobile')->name('change_mobile');

});


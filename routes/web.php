<?php

use App\Http\Controllers\Admin\OutletController;
use App\Http\Controllers\Front\PagesController;
use App\Http\Controllers\Front\UserController;
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
//     //broadcast(new DemoEvent('karthik'));
//     return view('welcome');
// });

Route::get('/clear', 'App\Http\Controllers\admin\LoginController@clear')->name('clear');

Route::get('/', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/listing-details/{id}', [PagesController::class, 'listingDetails'])->name('listing.details');
Route::get('/plans', [PagesController::class, 'packages']);
Route::get('/shop-listings', [PagesController::class, 'shopListings'])->name('shop.listings');
Route::get('/sign-in', [PagesController::class, 'sign_in']);
Route::get('/sign-up', [PagesController::class, 'sign_up']);

Route::get('/dashboard', [UserController::class, 'dashboard']);
Route::get('/add-listing', [UserController::class, 'add_listing']);
Route::get('/bookmark', [UserController::class, 'bookmark']);
Route::get('/booking', [UserController::class, 'booking']);
Route::get('/change-password', [UserController::class, 'change_password']);
Route::get('/collection-add', [UserController::class, 'collection_add']);
Route::get('/edit-profile', [UserController::class, 'edit_profile']);
Route::get('/messages', [UserController::class, 'messages']);
Route::get('/my-listing', [UserController::class, 'my_listing']);
Route::get('/loyality', [UserController::class, 'loyality']);
Route::get('/profile', [UserController::class, 'profile']);
Route::get('/reviews', [UserController::class, 'reviews']);
Route::get('/service-history', [UserController::class, 'service_history']);
Route::get('/setting-app', [UserController::class, 'setting_app']);
Route::get('/wallet', [UserController::class, 'wallet']);
Route::get('/wishlist', [UserController::class, 'wishlist']);


Route::get('/create-mc-client', 'App\Http\Controllers\MediaConverterController@createClient');
Route::get('/reset_password_auth', 'App\Http\Controllers\AjaxContoller@reset_password');
Route::get('/reset_password_auth/{id}', 'App\Http\Controllers\AjaxContoller@reset_password');
Route::post('/submit_reset_request', 'App\Http\Controllers\AjaxContoller@submit_reset_request')->name('submit_reset_request');
// Route::get('/', 'App\Http\Controllers\front\HomeController@index');
Route::get('/register', 'App\Http\Controllers\front\HomeController@register')->name("register-v");
Route::get('/verified', 'App\Http\Controllers\front\HomeController@verified')->name("verified");
Route::get('/email_verify/{id}', 'App\Http\Controllers\front\HomeController@email_verify')->name("email_verify");
Route::get('/auto_inactive', 'App\Http\Controllers\front\HomeController@auto_inactive')->name("auto_inactive");
Route::post('/save_vendor', 'App\Http\Controllers\front\HomeController@save_vendor');
Route::post('/checkAvailability', 'App\Http\Controllers\front\HomeController@checkAvailability');
Route::post("common/states/get_by_country", "App\Http\Controllers\admin\StatesController@get_by_country");
Route::post("common/cities/get_by_state", "App\Http\Controllers\admin\CitiesController@get_by_state");
Route::get('/reset_password', 'App\Http\Controllers\front\HomeController@reset_password');
Route::get('/share_link/{id}', 'App\Http\Controllers\front\HomeController@share_link');
Route::get('/reset_password/{id}', 'App\Http\Controllers\front\HomeController@reset_password');
Route::post('/new_password', 'App\Http\Controllers\front\HomeController@new_password')->name('vendor.new_password');
Route::any('/update_location', 'App\Http\Controllers\front\HomeController@update_location')->name('update_location');
Route::get('/ref_code/{id}', 'App\Http\Controllers\front\HomeController@share_link');
//Auth::routes();
Route::post("get_moda_sub_category_by_category", "App\Http\Controllers\admin\ModaCategories@moda_sub_category_by_category");
Route::post("cities/get_by_country", "App\Http\Controllers\admin\CitiesController@get_by_country");
Route::get('/admin', 'App\Http\Controllers\admin\LoginController@login')->name('admin.login');
Route::get('/admin/login', 'App\Http\Controllers\admin\LoginController@login')->name('admin.alogin');
Route::post('admin/check_login', 'App\Http\Controllers\admin\LoginController@check_login')->name('admin.check_login');
Route::get("get_category", "App\Http\Controllers\admin\LoginController@get_category")->name('new_get_category');
Route::get("page/{id}", "App\Http\Controllers\CmsController@page");
Route::namespace('App\Http\Controllers\admin')->prefix('admin')->middleware('admin')->name('admin.')->group(function () {

    Route::resource("amount_type", "AmountTypeController");
    Route::post('check_exciting_event', 'DoggyPlayTimeDatesController@check_exciting_event')->name('check_exciting_event');
    Route::get('vendor/dates/{vendor_id}', 'DoggyPlayTimeDatesController@getDiningDates')->name('vendor.doggy.dates');
    Route::post('vendor/add-dates', 'DoggyPlayTimeDatesController@addDateToService')->name('vendor.add-dates');
    Route::get('vendor_update_dates_data', 'DoggyPlayTimeDatesController@dining_update_dates_data')->name('dining_update_dates_data');
    Route::post('vendor/delete-date', 'DoggyPlayTimeDatesController@deleteDates')->name('vendor.delete-date');
    Route::post('vendor/delete-date-request', 'DoggyPlayTimeDatesController@deleteDateRequest')->name('vendor.delete-date-request');


    Route::get('change-password', 'AdminController@changePassword')->name('change.password');
    Route::post('change-password', 'AdminController@changePasswordSave')->name('change.password.save');
    Route::get('logout', 'LoginController@logout')->name('logout');
    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::get('import_export', 'ProductImportExport@import_export')->name('import_export');
    Route::post('Excel/upload_file', 'ProductImportExport@upload_file')->name('upload_file');
    Route::get('start_import', 'ProductImportExport@start_import')->name('start_import');
    Route::post('Excel/upload_zip_file', 'ProductImportExport@upload_zip_file')->name('upload_zip_file');
    Route::post('Excel/startUnzipImage', 'ProductImportExport@startUnzipImage')->name('startUnzipImage');
    Route::post('Excel/export', 'ProductImportExport@export_product')->name('export_product_post');
    Route::get('Excel/export', 'ProductImportExport@export_product')->name('export_product');

    Route::get("category", "Category@index");
    Route::get("category/create", "Category@create");
    Route::post("category/change_status", "Category@change_status");
    Route::get("category/edit/{id}", "Category@edit");
    Route::delete("category/delete/{id}", "Category@destroy");
    Route::post("save_category", "Category@store");
    Route::match(array('GET', 'POST'), 'category/sort', 'Category@sort');
    Route::get("category/get_category", "Category@get_category")->name('get_category');

    Route::resource("store_type", "StoreTypeController");
    Route::post("store_type/change_status", "StoreTypeController@change_status");
    Route::get("store_type/edit/{id}", "StoreTypeController@edit");
    Route::delete("store_type/delete/{id}", "StoreTypeController@destroy");

    Route::resource("coupons", "CouponsController");
    Route::post("delete_coupon_document", "CouponsController@deleteDocument");
    Route::get("coupon_usage", "CouponsController@couponUsage");
    Route::post("get_video_by_outlet", "VideosController@getVideoByOutlet");
    Route::delete("coupons/delete_image/{id}", "CouponsController@delete_image");

    Route::resource("country", "CountryController");


    Route::resource("admin_user_designation", "AdminUserDesignation");

    Route::resource("admin_users", "AdminUserController");
    Route::post("admin_users/change_status", "AdminUserController@change_status");
    Route::post("admin_users/verify", "AdminUserController@verify");
    Route::get("admin_users/update_permission/{id}", "AdminUserController@update_permission");
    Route::post("save_privilege", "AdminUserController@save_privilege");


    Route::resource("vendors", "VendorsController");
    Route::post("vendors/change_status", "VendorsController@change_status");
    Route::post("vendors/verify", "VendorsController@verify");


    Route::get("reports/customers", "ReportController@customers");
    Route::get("reports/outlet", "ReportController@outlet");
    Route::get("reports/ratings", "ReportController@ratings");
    Route::get("reports/coupons", "ReportController@coupons");
    Route::get("reports/user_earning", "ReportController@userEarning");

    Route::get("reports/export_customers", "ReportController@exportCustomers");
    Route::get("reports/export_outlet", "ReportController@exportOutlet");
    Route::get("reports/export_coupon", "ReportController@exportCoupon");
    Route::get("reports/export_ratings", "ReportController@exportRating");
    Route::get("reports/export_coupon_usage", "ReportController@exportCouponStatistics");

    Route::get("customers/blocked_users", "CustomersController@blocked_users");
    Route::get("customers/reported_users", "CustomersController@reported_users");
    Route::resource("customers", "CustomersController");
    Route::post("customers/change_status", "CustomersController@change_status");
    Route::post("customers/verify", "CustomersController@verify");

    Route::resource("outlet", "OutletController");
    Route::post("outlet/change_status", "OutletController@change_status");
    // Route to show the Add Service form
    Route::get('services/list', 'ServiceController@index');
    Route::get('/services/{vendor_id}', [OutletController::class, 'showServices'])->name('services.index');

    Route::get('/services/create/{vendor_id}', [OutletController::class, 'showServiceForm'])->name('services.create');
    Route::post('/services/store', [OutletController::class, 'storeOrUpdateService'])->name('services.store');
    Route::put('/services/{service_id}/update/{vendor_id}', [OutletController::class, 'storeOrUpdateService'])->name('services.update');

    Route::resource("events", "EventController");
    Route::post("events/change_status", "EventController@change_status");


    Route::resource("provider_registrations", "ProviderController");
    Route::delete("provider/delete/{id}", "ProviderController@destroy");
    Route::post("provider/change_status", "ProviderController@change_status");
    Route::get("provider/view/{id}", "ProviderController@view");

    Route::resource("store_managers_type", "StoremanagersTypeController");

    Route::resource("store_managers", "StoremanagersController");
    Route::post("store_managers/change_status", "StoremanagersController@change_status");


    Route::get("attribute_values/{id}", "AttributeController@attribute_values");
    Route::post('attribute_value_save', 'AttributeController@save_atr_values');
    Route::delete("attribute_values/delete/{id}", "AttributeController@delete_attribute_value");
    Route::get('attribute_values_edit/{id}', 'AttributeController@edit_attribute_value');

    Route::get("states", "StatesController@index");
    Route::get("states/create", "StatesController@create");
    Route::post("states/change_status", "StatesController@change_status");
    Route::get("states/edit/{id}", "StatesController@edit");
    Route::delete("states/delete/{id}", "StatesController@destroy");
    Route::post("save_states", "StatesController@store");
    Route::post("states/get_by_country", "StatesController@get_by_country");

    Route::get("cities", "CitiesController@index");
    Route::get("cities/create", "CitiesController@create");
    Route::post("cities/change_status", "CitiesController@change_status");
    Route::get("cities/edit/{id}", "CitiesController@edit");
    Route::delete("cities/delete/{id}", "CitiesController@destroy");
    Route::post("save_cities", "CitiesController@store");
    Route::post("cities/get_by_state", "CitiesController@get_by_state");
    Route::post("cities/get_by_country", "CitiesController@get_by_country");


    Route::get("store", "StoreController@index");
    Route::get("store/create", "StoreController@create");
    Route::post("store/change_status", "StoreController@change_status");
    Route::post("store/verify", "StoreController@verify");
    Route::get("store/edit/{id}", "StoreController@edit");
    Route::delete("store/delete/{id}", "StoreController@destroy");
    Route::delete("store/delete_image/{id}", "StoreController@delete_image");
    Route::post("save_store", "StoreController@store");
    Route::post("store/get_by_vendor", "StoreController@get_by_vendor");
    Route::get("store/get_all_store_list", "StoreController@get_all_store_list");
    Route::match(array('GET', 'POST'), 'store/sort', 'StoreController@sort');


    Route::get("banners", "BannerController@index");
    Route::match(array('GET', 'POST'), 'banner/create', 'BannerController@create');
    Route::get("banner/edit/{id}", "BannerController@edit");
    Route::post("banner/update", "BannerController@update");
    Route::delete("banner/delete/{id}", "BannerController@delete");

    Route::get("banner/get_category", "BannerController@get_category");


    Route::get('cms_pages', 'PagesController@index')->name('cms_pages');
    Route::get('page/create', 'PagesController@create')->name('cms_pages.add');
    Route::get('page/edit/{id}', 'PagesController@edit')->name('cms_pages.edit');
    Route::post('page/save', 'PagesController@save')->name('cms_pages.save');
    Route::delete('page/delete/{id}', 'PagesController@delete')->name('cms_pages.delete');
    Route::get('contact_details', 'PagesController@contact_details')->name('contact_details');
    Route::post("contact_us_setting_store", "PagesController@contact_us_setting_store")->name('contact_us_setting_store');
    Route::get('settings', 'PagesController@settings');
    Route::post("setting_store", "PagesController@setting_store")->name('setting_store');


    Route::get('contact_quries', 'PagesController@contact_quries')->name('contact_quries');


    //FAQ
    Route::get("faq", "FaqController@index");
    Route::match(array('GET', 'POST'), 'faq/create', 'FaqController@create');
    Route::get("faq/edit/{id}", "FaqController@edit");
    Route::post("faq/update", "FaqController@update");
    Route::delete("faq/delete/{id}", "FaqController@delete");

    Route::get("help", "HelpController@index");
    Route::match(array('GET', 'POST'), 'help/create', 'HelpController@create');
    Route::get("help/edit/{id}", "HelpController@edit");
    Route::post("help/update", "HelpController@update");
    Route::delete("help/delete/{id}", "HelpController@delete");

    Route::post('load_vendor', 'StoreController@load_vendor');

    Route::get('notifications', 'NotificationController@notifications')->name('notifications');
    Route::get('notifications/create', 'NotificationController@create')->name('notifications.add');
    Route::post('notifications/save', 'NotificationController@save')->name('notifications.save');
    Route::delete('notifications/delete/{id}', 'NotificationController@delete')->name('notifications.delete');


    Route::match(array('GET', 'POST'), 'change_password', 'UsersController@change_password');
    Route::match(array('GET', 'POST'), 'change_user_password', 'UsersController@change_user_password');


    Route::post("moda_sub_category_by_category", "ModaCategories@moda_sub_category_by_category");
    Route::resource("skin_color", "SkinColor");
    Route::post("skin_color/change_status", "SkinColor@change_status");

    Route::resource("hair_color", "HairColor");
    Route::post("hair_color/change_status", "HairColor@change_status");

    Route::resource("public_business_infos", "PublicBusinessInfo");
    Route::post("public_business_infos/change_status", "PublicBusinessInfo@change_status");
    Route::resource("hash_tags", "HashTag");

    Route::resource("videos", "VideosController");


    Route::post("foods/change_status", "Food@change_status");
});

/***Vendors***/
Route::get('/outlet', 'App\Http\Controllers\vendor\LoginController@login')->name('outlet.login');
Route::get('/vendor', 'App\Http\Controllers\vendor\LoginController@login')->name('vendor.login');
Route::post('vendor/check_login', 'App\Http\Controllers\vendor\LoginController@check_login')->name('vendor.check_login');
Route::get('/forgot-password', 'App\Http\Controllers\vendor\LoginController@forgotpassword')->name('vendor.forgot');
Route::post('vendor/check_user', 'App\Http\Controllers\vendor\LoginController@check_user')->name('vendor.check_user');

Route::namespace('App\Http\Controllers\vendor')->prefix('vendor_sign_up')->name('vendor_sign_up.')->group(function () {
    Route::resource("vendors", "VendorsController");
});

Route::namespace('App\Http\Controllers\vendor')->prefix('vendor')->middleware('vendor')->name('vendor.')->group(function () {

    Route::get('change-password', 'AdminController@changePassword')->name('change.password');
    Route::post('change-password', 'AdminController@changePasswordSave')->name('change.password.save');
    Route::get('logout', 'LoginController@logout')->name('logout');
    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::resource("vendors", "VendorsController");

    Route::resource("coupons", "CouponsController");
    Route::post("delete_coupon_document", "CouponsController@deleteDocument");
    Route::get("coupon_usage", "CouponsController@couponUsage");


    Route::get("reports/customers", "ReportController@customers");
    Route::get("reports/ratings", "ReportController@ratings");
    Route::get("reports/coupons", "ReportController@coupons");

    Route::get("reports/export_customers", "ReportController@exportCustomers");

    Route::get("reports/export_coupon", "ReportController@exportCoupon");
    Route::get("reports/export_ratings", "ReportController@exportRating");
    Route::get("reports/export_coupon_usage", "ReportController@exportCouponStatistics");


    Route::post("states/get_by_country", "StatesController@get_by_country");
    Route::post("cities/get_by_state", "CitiesController@get_by_state");

    /***Stores***/
    Route::get("store", "StoreController@index");
    Route::get("store/create", "StoreController@create");
    Route::post("store/change_status", "StoreController@change_status");
    Route::post("store/verify", "StoreController@verify");
    Route::get("store/edit/{id}", "StoreController@edit");
    Route::delete("store/delete/{id}", "StoreController@destroy");
    Route::delete("store/delete_image/{id}", "StoreController@delete_image");
    Route::post("save_store", "StoreController@store");
    Route::post("store/get_by_vendor", "StoreController@get_by_vendor");

    /***storeManager***/
    Route::resource("store_managers", "StoremanagersController");
    Route::post("store_managers/change_status", "StoremanagersController@change_status");

    Route::get("privilege", "PrivilegeController@privilege");
    Route::post("save_privilege", "PrivilegeController@save_privilege");

    Route::resource("store_managers_type", "StoremanagersTypeController");

    //designation
    Route::resource("designation", "DesignationController");
    Route::resource("amount_type", "DesignationController");
    /***Products***/
    Route::post("products/loadProductAttribute", "ProductController@loadProductAttribute");
    Route::post("products/loadProductVariations", "ProductController@loadProductVariations");
    Route::post("products/linkNewAttrForProduct", "ProductController@linkNewAttrForProduct");

    Route::get("products", "ProductController@index");

    Route::get("product/create", "ProductController@create");
    Route::post("product/add_product", "ProductController@add_product");
    Route::get("products/edit/{id}", "ProductController@create");
    Route::delete("products/delete/{id}", "ProductController@delete_product");
    Route::delete("products/delete_doc/{id}", "ProductController@delete_document");
    Route::post("products/change_status", "ProductController@change_status");
    Route::get("products_requests", "ProductController@products_requests");
    Route::get("products/add_to_product/{id}", "ProductController@add_to_product");
    Route::delete("products/delete_prd_req_doc/{id}", "ProductController@delete_prd_req_doc");
    Route::post("product/req_to_prd", "ProductController@req_to_prd");

    Route::post("products/unlinkAttrFromProduct", "ProductController@unlinkAttrFromProduct");
    Route::post("products/removeProductImage", "ProductController@removeProductImage");

    Route::get('product/export', 'ProductController@export')->name('product.export');
    Route::post('product/import', 'ProductController@import')->name('product.import');
    Route::post('product/image_upload', 'ProductController@unzip_image')->name('product.image_upload');
    Route::get('product/download_format', 'ProductController@download_format')->name('product.download_format');


    Route::get("orders", "OrderController@index");
    Route::get("order_details/{id}", "OrderController@details");
    Route::post("order/change_status", "OrderController@change_status");
    Route::post("order/change_return_status", "OrderController@change_return_status");
    Route::post("order/cancel_order", "OrderController@cancel_order");
    Route::get("order_edit/{id}", "OrderController@edit_order");

    /***VendorProfile***/
    Route::get('my_profile', 'VendorsController@MyProfile');

    Route::get('create_order', 'VendorsController@CreateOrder');
    Route::post('create_order_store', 'VendorsController@CreateOrderStore');

    Route::match(array('GET', 'POST'), 'change_password', 'UsersController@change_password');

    Route::get('import_export', 'ProductImportExport@import_export')->name('import_export');
    Route::post('Excel/export', 'ProductImportExport@export_product')->name('export_product_post');
    Route::get('Excel/export', 'ProductImportExport@export_product')->name('export_product');
    Route::post('Excel/upload_file', 'ProductImportExport@upload_file')->name('upload_file');
    Route::get('start_import', 'ProductImportExport@start_import')->name('start_import');
    Route::post('Excel/upload_zip_file', 'ProductImportExport@upload_zip_file')->name('upload_zip_file');
    Route::post('Excel/startUnzipImage', 'ProductImportExport@startUnzipImage')->name('startUnzipImage');


    Route::get("pictures", "PicturesController@index");
    Route::post("pictures/change_status", "PicturesController@change_status");
    Route::delete("pictures/delete/{id}", "PicturesController@destroy");

    Route::get("videos", "VideosController@index");
    Route::post("videos/change_status", "VideosController@change_status");
    Route::delete("videos/delete/{id}", "VideosController@destroy");
});
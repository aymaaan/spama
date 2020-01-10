<?php

//set language
Route::get('/language/{lang}', function ($lang) {
    $lang = LangUser($lang);
    return back();
});

Route::get('/logout', 'Auth\LoginController@logout');

// Authentication Routes...
$this->get('/login-to-store-admin', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('/login-to-store-admin', 'Auth\LoginController@login');
$this->post('/logout', 'Auth\LoginController@logout')->name('logout');
$this->post('/login-to-account', 'Auth\LoginMembersController@login');

Auth::routes();

Route::group(['prefix' => 'filemanager','middleware' => 'auth'], function() {
    Route::get('show', 'FilemanagerLaravelController@getShow');
    Route::get('connectors', 'FilemanagerLaravelController@getConnectors');
    Route::post('connectors', 'FilemanagerLaravelController@postConnectors');
});


Route::get('qr-code', function () {
    /*
    // Create image for this QR
    \QrCode::size(500)
              ->format('png')
              ->generate('ItSolutionStuff.com', ('uploads/qrcode.png'));
      */
    return view('backend.pages.qr_code');
      
  });


Route::group( ['prefix' => config('settings.BackendPath') , 'middleware' => 'admin' , 'namespace' => 'Backend'], function () {

//Users And Settings
Route::get('/', 'HomeController@index');
Route::get('/block/{id}/{action}', 'UsersController@block');
Route::get('/users/{id}/delete', 'UsersController@destroy');
Route::get('/users/{id}/ip', 'UsersController@ip_index');
Route::get('/users/details/{id}', 'UsersController@details');
Route::post('/user/update_settings', 'UsersController@update_settings');

Route::get('/settings', 'SettingsController@index');
Route::post('/settings', 'SettingsController@update');
Route::resource('/users', 'UsersController');
Route::resource('roles', 'RolesController');

//Languages
Route::resource('/languages', 'LanguagesController');
Route::get('/languages/approve/{id}/{status}', 'LanguagesController@approve');
Route::get('/languages/words/{code}', 'LanguagesController@getAllwords');
Route::post('/languages/words/{code}', 'LanguagesController@postAllwords');
Route::get('/languages/{id}/delete', 'LanguagesController@destroy');

//import excel
Route::post('/import_excel/import_products', 'ImportExcelController@import_products');
Route::post('/import_excel/import_categories', 'ImportExcelController@import_categories');
Route::post('/import_excel/import_customers', 'ImportExcelController@import_customers');
Route::post('/import_excel/import_suppliers', 'ImportExcelController@import_suppliers');
//export excel
Route::get('/export_excel/export_products', 'ImportExcelController@export_products');
Route::get('/export_excel/export_categories', 'ImportExcelController@export_categories');
Route::get('/export_excel/export_coupons/{campaign_title}', 'ImportExcelController@export_coupons');
Route::get('/websites_properties/export', 'ImportExcelWebsitesController@export_website');
Route::get('/websites_categories/export', 'ImportExcelWebsitesController@export_categories_website');
Route::get('/export_excel/export_customers', 'ImportExcelController@export_customers');
//products

Route::post('all_products', 'ProductsController@all_products' )->name('all_products');
Route::get('/products/{id}/approve/{status}', 'ProductsController@approve');
Route::get('/product/{id}', 'ProductsController@details');
Route::get('/products/{id}/delete', 'ProductsController@destroy');
Route::get('/products/get_mother_products_ajax/{type}', 'ProductsController@get_mother_products_ajax');
Route::get('/products/get_names_products_ajax/{type}', 'ProductsController@get_names_products_ajax');
Route::get('/products/get_features_products_ajax/{type}', 'ProductsController@get_features_products_ajax');
Route::get('/products/get_product_serial_ajax/{sku}', 'ProductsController@get_product_serial_ajax');
Route::get('/products/photos/delete/{id}', 'ProductsController@delete_photos');
Route::get('/products/get_consumer_price/{product_id}/{unit_id}/{quantity}', 'ProductsController@get_consumer_price_ajax');
Route::resource('/products', 'ProductsController');
Route::post('/pricing/update_settings_pricing', 'CustomersController@update_settings_pricing');
Route::post('/pricing/update_discount_pricing', 'CustomersController@update_discount_pricing');
Route::get('/pricing/delivery_place_type/{id}', 'CustomersController@get_delivery_place_type');
Route::post('/pricing/settings_add_fast_product', 'CustomersController@settings_add_fast_product');
//ZIP files
Route::get('/coupons/qr/{title}', 'ArchiveZipController@zip_qr');
Route::get('/products/photos/{id}', 'ArchiveZipController@zip_photos');

//Suppliers
Route::post('all_suppliers', 'SuppliersController@all_suppliers' )->name('all_suppliers');
Route::get('/suppliers/{id}/delete' , 'SuppliersController@destroy');
Route::get('/delegates/{id}/delete', 'SuppliersController@delegates_destroy');
Route::get('/suppliers/{id}/approve/{status}', 'SuppliersController@approve');
Route::get('/suppliers/{id}/products', 'SuppliersController@products');
Route::resource('/suppliers', 'SuppliersController');

//Categories
Route::resource('/categories', 'CategoriesController');
Route::get('/categories/approve/{id}/{status}', 'CategoriesController@approve');
Route::get('/categories/{id}/delete', 'CategoriesController@destroy');
Route::get('/categories/photos/delete/{id}', 'CategoriesController@delete_photos');

//Mother Products
Route::resource('/mother-products', 'MotherProductsController');
Route::get('/mother-products/approve/{id}/{status}', 'MotherProductsController@approve');
Route::get('/mother-products/{id}/delete', 'MotherProductsController@destroy');


//Departments
Route::resource('/departments', 'DepartmentsController');
Route::get('/departments/approve/{id}/{status}', 'DepartmentsController@approve');
Route::get('/departments/{id}/delete', 'DepartmentsController@destroy');


//Brands
Route::resource('/brands', 'BrandsController');
Route::get('/brands/approve/{id}/{status}', 'BrandsController@approve');
Route::get('/brands/{id}/delete', 'BrandsController@destroy');

//age_categories
Route::resource('/age_categories', 'AgeCategoriesController');
Route::get('/age_categories/{id}/delete', 'AgeCategoriesController@destroy');


//Units
Route::resource('/units', 'UnitsController');
Route::get('/units/approve/{id}/{status}', 'UnitsController@approve');
Route::get('/units/{id}/delete', 'UnitsController@destroy');

//assessment_questions
Route::resource('/assessment_questions', 'AssessmentQuestionsController');
Route::get('/assessment_questions/approve/{id}/{status}', 'AssessmentQuestionsController@approve');
Route::get('/assessment_questions/{id}/delete', 'AssessmentQuestionsController@destroy');



//Doctors
Route::resource('/doctors', 'DoctorsController');
Route::get('/doctors/approve/{id}/{status}', 'DoctorsController@approve');
Route::get('/doctors/{id}/delete', 'DoctorsController@destroy');

//Diseases
Route::resource('/diseases', 'DiseasesController');
Route::get('/diseases/approve/{id}/{status}', 'DiseasesController@approve');
Route::get('/diseases/{id}/delete', 'DiseasesController@destroy');

//Types
Route::resource('/types', 'TypesController');
Route::get('/types/approve/{id}/{status}', 'TypesController@approve');
Route::get('/types/{id}/delete', 'TypesController@destroy');


//Websites
Route::resource('/websites', 'WebsitesController');
Route::get('/websites/approve/{id}/{status}', 'WebsitesController@approve');
Route::get('/websites/{id}/delete', 'WebsitesController@destroy');
Route::get('/websites_fields/{id}/delete', 'WebsitesController@websites_fields_destroy');

//Names Products
Route::resource('/names-products', 'NamesMotherProductsController');
Route::get('/names-products/approve/{id}/{status}', 'NamesMotherProductsController@approve');
Route::get('/names-products/{id}/delete', 'NamesMotherProductsController@destroy');

//Features Products
Route::resource('/features-products', 'FeaturesController');
Route::get('/features-products/approve/{id}/{status}', 'FeaturesController@approve');
Route::get('/features-products/{id}/delete', 'FeaturesController@destroy');
Route::get('/features-products/order_list/{id}/{order_list}', 'FeaturesController@order_list');


//Sub Features Products
Route::resource('/sub-features-products', 'SubFeaturesController');
Route::get('/sub-features-products/approve/{id}/{status}', 'SubFeaturesController@approve');
Route::get('/sub-features-products/{id}/delete', 'SubFeaturesController@destroy');
Route::get('/sub-features-products/order_list/{id}/{order_list}', 'SubFeaturesController@order_list');

//Repositories
Route::resource('/repositories', 'RepositoriesController');
Route::get('/repositories/approve/{id}/{status}', 'RepositoriesController@approve');
Route::get('/repositories/{id}/delete', 'RepositoriesController@destroy');



//quantity_prices
Route::resource('/quantity_prices', 'QuantityPricesController');
Route::get('/quantity_prices/approve/{id}/{status}', 'QuantityPricesController@approve');
Route::get('/quantity_prices/{id}/delete', 'QuantityPricesController@destroy');



//coupons
Route::resource('/coupons', 'CouponsController');
Route::get('/coupons/approve/{id}/{status}', 'CouponsController@approve');
Route::get('/coupons/list/{id}', 'CouponsController@list');
Route::get('/coupons/print/{id}', 'CouponsController@print');
Route::get('/coupons/{id}/delete', 'CouponsController@destroy');


//sales_channels
Route::resource('/sales_channels', 'SalesChannelsController');
Route::get('/sales_channels/approve/{id}/{status}', 'SalesChannelsController@approve');
Route::get('/sales_channels/{id}/delete', 'SalesChannelsController@destroy');
Route::get('/sales_channels/delegates/{id}/delete', 'SalesChannelsController@delegates_destroy');


//customers_cases
Route::resource('/customers_cases', 'CustomersCasesController');
Route::get('/customers_cases/approve/{id}/{status}', 'CustomersCasesController@approve');
Route::get('/customers_cases/{id}/delete', 'CustomersCasesController@destroy');


//commercial_activities
Route::resource('/commercial_activities', 'CommercialActivitiesController');
Route::get('/commercial_activities/approve/{id}/{status}', 'CommercialActivitiesController@approve');
Route::get('/commercial_activities/{id}/delete', 'CommercialActivitiesController@destroy');



//customers
Route::resource('/customers', 'CustomersController');
Route::get('/customers/details/{id}', 'CustomersController@details');
Route::get('/customers/approve/{id}/{status}', 'CustomersController@approve');
Route::get('/customers/{id}/delete', 'CustomersController@destroy');
Route::get('/customers/get_followed_delegate_ajax/{id}', 'CustomersController@get_followed_delegate_ajax');



//assessment
Route::get('/assessment', 'AssessmentController@assessment_index');
Route::get('/tree_mother_products/{id}', 'AssessmentController@tree_mother_products_ajax');
Route::get('/tree_products/{id}/{customer_id}/{request_by}', 'AssessmentController@tree_products_ajax');
//customers assessment questions
Route::get('/assessment/{id}', 'AssessmentController@make_assessment');
Route::post('/assessment/{id}', 'AssessmentController@post_assessment');

Route::get('/pricing', 'AssessmentController@pricing_index');

//customers assessment products
Route::get('/assessment_products_doctor/{id}', 'AssessmentController@make_assessment_products_doctor');
Route::get('/assessment_products_delegate/{id}', 'AssessmentController@make_assessment_products_delegate');
Route::post('/assessment_products_delegate/{id}', 'AssessmentController@post_assessment_products_delegate');
Route::post('/post_assessment_update_products_delegate/{id}', 'AssessmentController@post_assessment_update_products_delegate');
Route::get('/consumer/products/{id}', 'AssessmentController@consumer_products');
Route::get('/assessment_products/{id}/delete', 'AssessmentController@products_delete');
Route::get('/assessment_products/details/{id}', 'AssessmentController@details_assessment_products_by_serial');
Route::get('/consumer/re_assessment/{id}', 'AssessmentController@re_assessment');
Route::get('/consumer/re_assessment/{id}', 'AssessmentController@re_assessment');
Route::get('/customers/pricing/{id}', 'CustomersController@pricing');

//cities
Route::resource('/cities', 'CityController');
Route::get('/cities/{id}/delete', 'CityController@destroy');
    
//nationalities
Route::resource('/nationalities', 'NationalityController');
Route::get('/nationalities/{id}/delete', 'NationalityController@destroy');
    
//drivers
Route::resource('/drivers', 'DriverController');
Route::get('/drivers/approve/{id}/{status}', 'DriverController@approve');
Route::get('/drivers/{id}/delete', 'DriverController@destroy');

//orders
Route::resource('/orders', 'OrderController');
Route::get('/orders/{id}/delete', 'OrderController@destroy');
Route::get('/orders/{id}/delete/stop', 'OrderController@destoryStop');
Route::get('/getCustomer', 'OrderController@getCustomer');

//branches
Route::resource('/branches', 'BranchController');
Route::get('/branches/{id}/delete', 'BranchController@destroy');

//branches
Route::resource('/order_confirmation', 'OrderConfirmationController');
Route::get('/statusChange', 'OrderConfirmationController@statusChange');


});



// Frontend Routes
Route::group( ['prefix' => Config::get('app.locale')  , 'namespace' => 'Frontend'], function () {

    Route::get('{lang?}/', 'HomeController@index');


});
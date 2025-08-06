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

// main page for usage (MAIN page)
Route::group(['middleware' => ['auth', 'role:0,1']], function () {
    Route::get('/', 'Pages\IndexController@index')->name('pages.index');
    Route::get('/pharmacyMedicine/{pharmacy}', 'Pages\IndexController@pharmacyMedicine')->name('pages.pharmacyMedicine');
    Route::get('/categoryMedicine/{category}', 'Pages\IndexController@categoryMedicine')->name('pages.categoryMedicine');

    Route::group(['namespace' => 'Cart', 'prefix' => '/cart'], function () {
        Route::get('/index', 'IndexController@index')->name('cart.index');
        Route::get('/add/{medicine}', 'IndexController@add')->name('cart.add');
        Route::get('/remove/{id}', 'IndexController@remove')->name('cart.remove');
        Route::get('/plus/{id}', 'IndexController@plusProduct')->name('cart.plusProduct');
        Route::get('/sub/{id}', 'IndexController@subProduct')->name('cart.subProduct');
    });

    Route::get('/order', 'Order\IndexController@add')->name('order.add');
});


// admin panel
Route::group(['namespace' => 'Admin', 'middleware' => ['auth', 'role:1'], 'prefix' => '/admin'], function () {
    Route::get('/', 'IndexController')->name('admin.index');

    Route::group(['prefix' => '/user'], function () {

        Route::get('/', 'UserController@index')->name('admin.user.index');                // список
        Route::get('/create', 'UserController@create')->name('admin.user.create');        // форма создания
        Route::post('/store', 'UserController@store')->name('admin.user.store');          // сохранить нового
        Route::get('/{user}/edit', 'UserController@edit')->name('admin.user.edit');       // форма редактирования
        Route::patch('/update/{user}', 'UserController@update')->name('admin.user.update'); // обновление
        Route::delete('/{user}/delete', 'UserController@delete')->name('admin.user.delete'); // удалить
        Route::get('/{user}', 'UserController@show')->name('admin.user.show');            // показать
    });

    Route::group(['prefix' => '/pharmacy'], function () {

        Route::get('/', 'PharmacyController@index')->name('admin.pharmacy.index');                // список
        Route::get('/create', 'PharmacyController@create')->name('admin.pharmacy.create');        // форма создания
        Route::post('/store', 'PharmacyController@store')->name('admin.pharmacy.store');          // сохранить нового
        Route::get('/{pharmacy}/edit', 'PharmacyController@edit')->name('admin.pharmacy.edit');       // форма редактирования
        Route::patch('/update/{pharmacy}', 'PharmacyController@update')->name('admin.pharmacy.update'); // обновление
        Route::delete('/{pharmacy}/delete', 'PharmacyController@delete')->name('admin.pharmacy.delete'); // удалить
        Route::get('/{pharmacy}', 'PharmacyController@show')->name('admin.pharmacy.show');            // показать
    });
});

// Pharmacist
Route::group(['namespace' => 'Pharmacy', 'prefix' => '/pharmacy', 'middleware' => ['auth', 'role:2']], function () {

    Route::group(['prefix' => '/medicine'], function () {
        Route::get('/', 'MedicineController@index')->name('pharmacy.medicine.index');                // список
        Route::get('/create', 'MedicineController@createMedicine')->name('pharmacy.medicine.create');        // форма создания
        Route::post('/store', 'MedicineController@storeMedicine')->name('pharmacy.medicine.store');          // сохранить нового
        Route::get('/{medicine}/edit', 'MedicineController@editMedicine')->name('pharmacy.medicine.edit');       // форма редактирования
        Route::patch('/update/{medicine}', 'MedicineController@updateMedicine')->name('pharmacy.medicine.update'); // обновление
        Route::delete('/{medicine}/delete', 'MedicineController@deleteMedicine')->name('pharmacy.medicine.delete'); // удалить
        Route::get('/{medicine}', 'MedicineController@showMedicine')->name('pharmacy.medicine.show');
    });

    Route::group(['prefix' => '/order'], function () {
        Route::get('/', 'OrderController@index')->name('pharmacy.order.index');                // список
        Route::match(['get', 'post'], '/{order}', 'OrderController@show')->name('pharmacy.order.show');
        Route::post('/{order}/status', 'OrderController@updateStatus')->name('pharmacy.order.updateStatus');                // список
        Route::post('/{order}/courier', 'OrderController@updateCourier')->name('pharmacy.order.updateCourier');                // список

    });

    Route::get('/', 'IndexController@index')->name('pharmacy.index');
    Route::get('/pharmacies', 'IndexController@pharmacy')->name('pharmacy.pharmacy');
    Route::get('/{pharmacy}', 'IndexController@medicinePharmacy')->name('pharmacy.medicinePharmacy');
});


// Courier

Route::group(['namespace' => 'Courier', 'prefix' => '/courier', 'middleware' => ['auth', 'role:3']], function () {
    Route::get('/', 'IndexController@index')->name('courier.index');
    Route::get('/profile', 'IndexController@profile')->name('courier.profile');
    Route::get('/editProfile/{user}', 'IndexController@editProfile')->name('courier.profile.edit');
    Route::patch('/updateProfile/{user}', 'IndexController@updateProfile')->name('courier.profile.update');

    Route::group(['prefix' => '/order'], function () {
        Route::get('/', 'OrderController@index')->name('courier.order.index');
        Route::get('/{order}', 'OrderController@show')->name('courier.order.show');
    });
});
//Route::group(['middleware' => ['auth', 'role:0']], function () {
//    Route::get('/home', 'UserController@index');
//});
//
//Route::group(['middleware' => ['auth', 'role:1']], function () {
//    Route::get('/admin', 'AdminController@index');
//});
//
//Route::group(['middleware' => ['auth', 'role:2']], function () {
//    Route::get('/medicine', 'PharmacyController@index');
//});
//
//Route::group(['middleware' => ['auth', 'role:3']], function () {
//    Route::get('/courier', 'CourierController@index');
//});


Auth::routes();

Route::get('/redirect_role', 'HomeController@redirect_role')->name('redirect-role');
Route::get('/home', 'HomeController@index')->name('auth');
Route::get('/addcart', 'Pages\IndexController@addcart')->name('addcart');

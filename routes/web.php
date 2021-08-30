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

Route::group([ 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'CheckUserRole']], function() {
	    Route::get('/', 'Admin\NavigationController@dashboard')->name('dashboard');
		Route::resource('/warehouse', 'Admin\WareHouseController');
		Route::resource('/departments', 'Admin\DepartmentController');
		Route::resource('/manager', 'Admin\ManagerController');
		Route::resource('/employee', 'Admin\EmployeeController');
		Route::resource('/inoutloads', 'Admin\InOutLoadController');
		Route::post('/get_ssn', 'Admin\InOutLoadController@get_ssn')->name('get_ssn');
	    Route::any('/customer-invoice', 'Admin\ReportController@customer_invoice')->name('customer-invoice');
		// Route::any('/generate-invoice/{id}', 'Admin\ReportController@generate_invoice')->name('generate-invoice');
		Route::any('/carrier-invoice', 'Admin\ReportController@carrier_invoice')->name('carrier-invoice');
	    Route::any('/driver-invoice', 'Admin\ReportController@driver_invoice')->name('driver-invoice');
        Route::any('/hourly_report', 'Admin\ReportController@hourly_report')->name('hourly-report');
        Route::any('/fix_report', 'Admin\ReportController@fix_report')->name('fix-report');
        Route::any('/hourly_fix_report', 'Admin\ReportController@hourly_fix_report')->name('hourly-fix-report');
		Route::any('/load-revenue', 'Admin\ReportController@load_revenue')->name('load-revenue');
		Route::any('/load-productivity', 'Admin\ReportController@load_productivity')->name('load-productivity');
		Route::get('/export-excel', 'Admin\ReportController@export_customer')->name('export-excel');
		Route::get('/export-carrier-excel', 'Admin\ReportController@export_carrier')->name('export-carrier-excel');
		Route::get('/export-driver-excel', 'Admin\ReportController@export_driver')->name('export-driver-excel');
		Route::get('/export-Load-Revenue', 'Admin\ReportController@export_Load_Revenue')->name('export-Load-Revenue');
		Route::get('/export-Load-Productivity', 'Admin\ReportController@export_Load_Productivity')->name('export-Load-Productivity');
		Route::get('/export-Hourly-Pay', 'Admin\ReportController@export_Hourly_Pay')->name('export-Hourly-Pay');
		Route::get('/export-Hourly-fix-Pay', 'Admin\ReportController@export_Hourly_fix_Pay')->name('export-Hourly-fix-Pay');
		Route::get('/export-fix-only-Pay', 'Admin\ReportController@export_fix_only_Pay')->name('export-fix-only-Pay');


});

Route::group([ 'prefix' => 'manager', 'as' => 'manager.', 'middleware' => ['auth', 'CheckUserRole']], function() {

        Route::get('/', 'Manager\NavigationController@dashboard')->name('dashboard');
        Route::resource('/manager', 'Manager\ManagerController');
        Route::resource('/employee', 'Manager\EmployeeController');
        Route::resource('/inoutloads', 'Manager\InOutLoadController');
        Route::post('/get_ssn', 'Manager\InOutLoadController@get_ssn')->name('get_ssn');
        // Route::get('/show_employees', 'Manager\EmployeeController')->name('show_employees');
});

Route::group([ 'prefix' => 'employee', 'as' => 'employee.', 'middleware' => ['auth', 'CheckUserRole']], function() {

        Route::get('/', 'Employee\NavigationController@dashboard')->name('dashboard');
	//define routes here for employee
});

// Route::get('stripe', 'StripePaymentController@stripe');
// Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');

// Route::prefix('dev')->group(function(){
// 	Route::get('config-cache', function(){
// 		try{
// 			\Artisan::call('config:cache');
// 			echo "Media Storage Linked Successfully";
// 		} catch( \Exception $e) {
// 			dd($e->getMessage());
// 		}
// 	});
// });

Route::prefix('dev')->group(function(){
	Route::get('config-clear', function(){
		try{
			\Artisan::call('config:clear');
			echo "Configuration cache cleared!";
		} catch( \Exception $e) {
			dd($e->getMessage());
		}
	});
});

Route::prefix('dev')->group(function(){
	Route::get('route-clear', function(){
		try{
			\Artisan::call('route:clear');
			echo "Route cache cleared!";
		} catch( \Exception $e) {
			dd($e->getMessage());
		}
	});
});

Route::prefix('dev')->group(function(){
	Route::get('view-clear', function(){
		try{
			\Artisan::call('view:clear');
			echo "View cache cleared!";
		} catch( \Exception $e) {
			dd($e->getMessage());
		}
	});
});

Route::prefix('dev')->group(function(){
	Route::get('config-cache', function(){
		try{
			\Artisan::call('config:cache');
			echo "Configuration cache cleared!";
			echo "Configuration cached successfully!";
		} catch( \Exception $e) {
			dd($e->getMessage());
		}
	});
});

Route::prefix('dev')->group(function(){
	Route::get('route-cache', function(){
		try{
			\Artisan::call('route:cache');
			echo "Route cache cleared!";
			echo "Route cached successfully!";
		} catch( \Exception $e) {
			dd($e->getMessage());
		}
	});
});

Route::prefix('dev')->group(function(){
	Route::get('view-cache', function(){
		try{
			\Artisan::call('view:cache');
			echo "View cache cleared!";
			echo "View cached successfully!";
		} catch( \Exception $e) {
			dd($e->getMessage());
		}
	});
});





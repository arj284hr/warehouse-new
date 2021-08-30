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
	    Route::get('/customer-invoice', 'Admin\ReportController@customer_invoice')->name('customer-invoice');
	    Route::post('/get-customer-invoice', 'Admin\ReportController@get_customer_invoice')->name('get-customer-invoice'); 
		// Route::post('/', 'Admin\ReportController@');
		// Route::post('/', 'Admin\ReportController@');
		// Route::post('/', 'Admin\ReportController@');
		// Route::post('/', 'Admin\ReportController@');
		// Route::post('/', 'Admin\ReportController@');
		// Route::post('/', 'Admin\ReportController@');
		// Route::post('/', 'Admin\ReportController@');
		// Route::post('/', 'Admin\ReportController@');
		
		
});

Route::group([ 'prefix' => 'manager', 'as' => 'manager.', 'middleware' => ['auth', 'CheckUserRole']], function() {
        
        Route::get('/', 'Manager\NavigationController@dashboard')->name('dashboard');
        Route::resource('/manager', 'Manager\ManagerController');
        Route::resource('/employee', 'Manager\EmployeeController');
        Route::resource('/inoutloads', 'Manager\InOutLoadController');
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





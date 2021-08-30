<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Auth Routes
Route::post('/signup', 'Api\AuthController@register');
Route::post('/login', 'Api\AuthController@login');
Route::post('/update_profile_image', 'Api\AuthController@update_profile_image');
Route::post('/update_profile', 'Api\AuthController@update_profile');
Route::post('/forgot_password', 'Api\AuthController@forgot_password');
Route::post('/verify_code', 'Api\AuthController@verify_code');
Route::post('/reset_password', 'Api\AuthController@reset_password');
Route::post('/logout', 'Api\AuthController@logout');
Route::post('/get_my_notifications', 'Api\MainController@get_my_notifications');
Route::post('/change_password', 'Api\AuthController@change_password');
Route::post('/nearby_sellers', 'Api\MainController@nearby_sellers');
Route::post('/products_by_seller', 'Api\MainController@products_by_seller');
Route::get('/globe_search', 'Api\MainController@globe_search');
Route::post('/follow_seller', 'Api\MainController@follow_seller');
Route::post('/seller_details', 'Api\MainController@seller_details');
//End Auth Routes

//Product Posts APIs
Route::post('/post_product', 'Api\MainController@post_product');
Route::post('/mark_as_sold', 'Api\MainController@mark_as_sold');
Route::post('/my_product_posts', 'Api\MainController@my_product_posts');
Route::post('/post_details', 'Api\MainController@post_details');
Route::post('/rate_us', 'Api\MainController@rate_us');
Route::post('/rate_user', 'Api\MainController@rate_user');
//End Product Posts APIs


//Attendence API
Route::post('/match_ssn', 'Api\MainController@match_ssn');
Route::get('/attendence_data', 'Api\MainController@attendence_data');
Route::post('/get_my_attendence', 'Api\MainController@get_my_attendence');
Route::post('/attendence', 'Api\MainController@attendence');

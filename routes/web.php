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


Route::get('/clear-cache', function() {
	$exitCode = Artisan::call('cache:clear');
});
Route::get('/', function () {
    return view('login');
});

Route::get('/signin', 'PermissionController@login');
Route::get('/signup', 'PermissionController@reg');


Route::group(['middleware' => 'CheckUser'], function () {
    Route::get('/signout', 'PermissionController@logout');

    Route::get('/dashboard','DashboardController@index');//->middleware('CheckUser');
    Route::get('/getPostCharts','DashboardController@getPostCharts');
    Route::get('/getCampaign','DashboardController@getCampaign');
    Route::get('/addCampaign','DashboardController@addCampaign');
    Route::get('/updateCampaign','DashboardController@updateCampaign');
    Route::get('/deleteCampaign','DashboardController@deleteCampaign');
    Route::get('/setRouteParam','DashboardController@setRouteParam');

    Route::get('/users', function () {
        return view('manage/user');
    });
    Route::get('/getUsers', 'UserController@store');
    Route::get('/addUser', 'UserController@create');
    Route::get('/updateUser', 'UserController@update');
    Route::get('/deleteUser', 'UserController@delete');

    Route::get('/accounts','AccountController@index');
    Route::get('/getAccounts', 'AccountController@store');
    Route::get('/getLocations', 'AccountController@getLocation');
    Route::post('/addAccount', 'AccountController@create');
    Route::get('/addAccount', 'AccountController@create');
    Route::post('/updateAccount', 'AccountController@update');
    Route::get('/updateAccountCell', 'AccountController@updateAccountCell');
    Route::get('/deleteAccount', 'AccountController@delete');

    Route::get('/ads','AdsController@index');
    Route::get('/getAds', 'AdsController@store');
    Route::post('/uploadFiles', 'AdsController@uploadFiles');
    Route::get('/uploadFiles', 'AdsController@uploadFiles');
    Route::get('/getImages', 'AdsController@getImages');
    Route::get('/deleteImages', 'AdsController@deleteImages');
    Route::get('/getSubCat', 'AdsController@getSubCat');
    Route::get('/getChildLocations', 'AdsController@getChildLocations');
    Route::get('/getSpecLocations', 'AdsController@getSpecLocations');
    Route::get('/getSelState', 'AdsController@getSelState');
    Route::get('/getZipCode', 'AdsController@getZipCode');
    Route::get('/getCityName', 'AdsController@getCityName');
    Route::get('/addAds', 'AdsController@create');
    Route::get('/getSelAccounts', 'AdsController@selAccount');
    Route::get('/getSelAds', 'AdsController@getSelAds');
    Route::post('/addAds', 'AdsController@create');
    Route::post('/updateAds', 'AdsController@update');
    Route::post('/updateAdsCell', 'AdsController@updateAdsCell');
    Route::get('/deleteAds', 'AdsController@delete');
    Route::get('/setAccont', 'AdsController@setAccount');

    Route::get('/posts','PostController@index');
    Route::get('/getPost', 'PostController@store');

    Route::get('/calls','CallController@index');
    Route::get('/getCall', 'CallController@store');
    Route::get('/getCallCharts', 'CallController@getCallCharts');

    Route::get('/cards','CardController@index');
    Route::get('/getCard', 'CardController@store');
    Route::post('/addCard', 'CardController@create');
    Route::post('/updateCard', 'CardController@update');
    Route::get('/deleteCard', 'CardController@delete');

    Route::get('/category','CategoryController@index');
    Route::get('/getCategory', 'CategoryController@store');
    Route::post('/addCategory', 'CategoryController@create');
    Route::post('/updateCategory', 'CategoryController@update');
    Route::get('/deleteCategory', 'CategoryController@delete');

    Route::get('/location','LocationController@index');
    Route::get('/getLocation', 'LocationController@store');
    Route::get('/addLocation', 'LocationController@create');
    Route::post('/updateLocation', 'LocationController@update');
    Route::get('/deleteLocation', 'LocationController@delete');

    Route::get('/token','TokenController@index');
    Route::get('/getToken', 'TokenController@store');
    Route::get('/addToken', 'TokenController@create');
    Route::post('/updateToken', 'TokenController@update');
    Route::get('/deleteToken', 'TokenController@delete');

});
































































Route::get('/testSState', 'AdsController@getSState');

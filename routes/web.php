<?php

use App\Http\Middleware\LoginAuthentication;
use App\Directory;
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

// Route::group(array('prefix' => 'api'), function () {
//     Route::get('/{controller}/{action?}', function($controller, $action = 'index') {
//         $controller = "Api" . ucfirst($controller . "Controller");
//         $action = "get" . ucfirst($action);
//         return App::make($controller)->$action();
//     });


//     Route::post('/{controller}/{action?}', function($controller, $action = 'index') {
//         $controller = "Api" . ucfirst($controller . "Controller");
//         $action = "post" . ucfirst($action);
//         return App::make($controller)->$action();
//     });
    
// });

// Route::get('/', function () {
//     return view('layouts/login');
// });

// Route for landing page
Route::get('/', 'HomeController@home');
// Route for home page
Route::get('/home', 'HomeController@home');

// Route for business directory page
Route::get('/businessDirectory', 'HomeController@businessDirectory');

Route::get('/businessDirectory/{directory}', 'HomeController@businessDirectory');//->name('directory.title');
// $router->get('/businessDirectory/{directory}', function(Directory $directory) {
//    return view('admin.login');
// });


Route::get('/businessCatLists/{id}', 'HomeController@businessCatLists');
Route::get('/businessCatNameLists/{name1}/{name2}', 'HomeController@businessCatNameLists');
Route::get('/businessCatNameLists/{name1}', 'HomeController@businessCatNameLists');

// Route for business directory overview page
Route::get('/overview/{business}', 'HomeController@businessDirectoryOverview'); ///{id}
//Route::get('/{business}', 'HomeController@businessDirectoryOverview');


// Route for Contact us page
Route::get('/contactUs', 'HomeController@contactUs');

// Route for events page

Route::get('event', 'HomeController@event');
Route::get('addEvent', 'HomeController@addEvent');
Route::post('addEvent', 'HomeController@addEvent');

// Route for events page
Route::get('/aboutUs', 'HomeController@aboutUs');

Route::get('/register/{bid}', 'HomeController@register');
Route::post('/register', 'HomeController@register');

Route::post('searchBusiness', 'HomeController@searchBusiness');
Route::get('searchBusiness', 'HomeController@searchBusiness');
Route::post('sendMsg', 'HomeController@sendMsg');

Route::post('loadEvent', 'HomeController@loadEvent');
Route::get('loadEvent', 'HomeController@loadEvent');


Route::post('/getBusinessByCat', 'HomeController@getBusinessByCat');

Route::post('access', 'HomeController@loginCheck');
Route::post('rate', 'HomeController@rate');
Route::get('home/logout', 'HomeController@logout');    
Route::post('bookmark', 'HomeController@bookmark');

// Route for registration page
Route::get('/registration', 'HomeController@registration');

Route::get('/scrap', 'HomeController@scrap');

//-------------------------- admin part --------------------------------//

Route::get('admin', 'AdminController@login');
Route::get('admin/login', 'AdminController@login');
Route::get('admin/register', 'AdminController@register');
Route::post('loginCheck', 'AdminController@loginCheck');
Route::get('admin/loginCheck', 'AdminController@loginCheck');

Route::get('admin/test', 'AdminController@test');

Route::group(['middleware' => ['web']], function () {
    Route::get('admin/dashboard', 'AdminController@dashboard')->middleware(LoginAuthentication::class);
    
    // user routes
    Route::get('admin/users', 'AdminController@users')->middleware(LoginAuthentication::class);    
    Route::post('admin/deleteUser', 'AdminController@deleteUser');    
    
    Route::get('admin/addUser', 'AdminController@addUser');    
    Route::post('admin/addUser', 'AdminController@addUser');
    
    Route::get('admin/editUser/{id}', 'AdminController@editUser');
    Route::post('admin/editUser', 'AdminController@editUser');

    // business routes
    Route::get('admin/directoryLists/{pid}', 'AdminController@directoryLists')->middleware(LoginAuthentication::class);    
    Route::get('admin/businessLists/{pid}', 'AdminController@businessLists')->middleware(LoginAuthentication::class);    
    Route::post('admin/deleteDirectory', 'AdminController@deleteDirectory');    
    Route::post('admin/deleteBusiness', 'AdminController@deleteBusiness');    
    
    Route::get('admin/addDirectory/{pid}', 'AdminController@addDirectory');    
    Route::post('admin/addDirectory/{pid}', 'AdminController@addDirectory');
    
    Route::get('admin/editDirectory/{id}', 'AdminController@editDirectory');
    Route::get('admin/editDirectory', 'AdminController@editDirectory');
    Route::post('admin/editDirectory', 'AdminController@editDirectory');

    Route::get('admin/addBusiness/{pid}', 'AdminController@addBusiness');    
    Route::post('admin/addBusiness/{pid}', 'AdminController@addBusiness');    

    Route::get('admin/editBusiness/{id}', 'AdminController@editBusiness');
    Route::get('admin/editBusiness', 'AdminController@editBusiness');
    Route::post('admin/editBusiness', 'AdminController@editBusiness');
    
    // category routes
    Route::get('admin/categoryLists', 'AdminController@categoryLists')->middleware(LoginAuthentication::class);    
    Route::post('admin/deleteCategory', 'AdminController@deleteCategory');    
    
    Route::get('admin/addCategory', 'AdminController@addCategory');    
    Route::post('admin/addCategory', 'AdminController@addCategory');
    
    Route::get('admin/editCategory/{id}', 'AdminController@editCategory');
    Route::post('admin/editCategory', 'AdminController@editCategory');


    // contact route
    Route::get('admin/contactLists', 'AdminController@contactLists');
    Route::get('admin/rateLists', 'AdminController@rateLists');

    // event routes
    Route::get('admin/eventLists', 'AdminController@eventLists')->middleware(LoginAuthentication::class);    
    Route::post('admin/deleteEvent', 'AdminController@deleteEvent');    
    
    Route::get('admin/addEvent', 'AdminController@addEvent');    
    Route::post('admin/addEvent', 'AdminController@addEvent');
    
    Route::get('admin/editEvent/{id}', 'AdminController@editEvent');
    Route::post('admin/editEvent', 'AdminController@editEvent');

    Route::get('admin/adLists', 'AdminController@adLists')->middleware(LoginAuthentication::class);    
    Route::post('admin/deleteAd', 'AdminController@deleteAd');    
    
    Route::get('admin/addAd', 'AdminController@addAd');
    Route::post('admin/addAd', 'AdminController@addAd');
    
    Route::get('admin/editAd/{id}', 'AdminController@editAd');
    Route::post('admin/editAd', 'AdminController@editAd');

    
    // hour routes
    Route::get('admin/timeLists', 'AdminController@timeLists')->middleware(LoginAuthentication::class);    
    Route::post('admin/deleteTime', 'AdminController@deleteTime');    
    
    Route::get('admin/addTime', 'AdminController@addTime');    
    Route::post('admin/addTime', 'AdminController@addTime');
    
    Route::get('admin/editTime/{id}', 'AdminController@editTime');
    Route::post('admin/editTime', 'AdminController@editTime');    

    Route::get('admin/settings', 'AdminController@settings');    
    Route::post('admin/settings', 'AdminController@settings');    
    

    Route::get('logout', 'AdminController@logout');    
});



//Auth::routes();
//Route::get('/post', 'PostController@index')->name('home');
//Route::get(trans('routes.post') . '/{post}', 'PostController@show')->name('post.show');


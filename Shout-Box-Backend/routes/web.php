<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BioController;


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

Route::get('/friends/{id}',"UserController@addFriend");
// Route::get('/accept/{id}',"UserController@acceptFriend");
Route::get('/accepted',"UserController@allAcceptedFriends");

Route::get('/showpost/{id}',"UserController@showPost");

Route::get('/confirm/{id}',"UserController@acceptFriend");


Route::get('/getall/{id}',"UserController@getAllUsers");

Route::any('/removefriend/{user_id}/{friend_id}', "UserController@rejectRequest");

Route::get('/isfriend/{user_id}/{friend_id}', "UserController@isFriend");

Route::any('/timeline/{id}',"UserController@getFriendsPosts");

Route::get('/postoffriends/{id}', "UserController@PostOfFriends");

//bio

Route::get('/bio/{id}',"BioController@getBioOfUser");

Route::any('/addbio/{id}',"BioController@addBio");

Route::any('/updatebio/{id}',"BioController@updateBio");

//route for admin:
// Route::get("users", [UserController::class, 'getUserByRoleAndIsapproved']);
// Route::get("/updatestatus/{id}", [UserController::class, 'updatestatus']);

// Route::view('/admin', 'admin');
Route::get("/admin", [AdminController::class, 'adminView']);

Route::post("admin", [AdminController::class, 'adminlogin']);

//------------------------------Admin-------------------------------------------
Route::get('/', "AdminController@getUserByRoleAndIsapproved");
Route::get('/users', "AdminController@getUserByRoleAndIsapproved");
Route::get('/updatestatus/{id}', "AdminController@updatestatus");
Route::get('getReportedShouts', "AdminController@getReportedShouts");

Route::get('/deleteReportedShouts/{id}', "AdminController@deleteReportedShouts");

//getAllloginUsers
Route::get('getAllloginUsers', "AdminController@getUserByRole");


Route::get('/deleteUser/{id}', "AdminController@deleteUser");

Route::get('getAllPosts', "AdminController@getAllPosts");

Route::get('/deletePost/{id}', "AdminController@deletePost");

Route::get('/reject/{id}', "AdminController@reject");
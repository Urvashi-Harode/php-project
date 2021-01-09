<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\BioController;
use App\Http\Controllers\FriendController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//friend api
Route::get('/accepted/{id}', [FriendController::class,'allAcceptedFriends']);
Route::get('/pending/{id}', [FriendController::class,'allPendingRequest']);

Route::post('addfriend', [FriendController::class,'addFriend']);

Route::get('/userlist/{id}', [FriendController::class,'getAllUsers']);

Route::post('acceptrequest', [FriendController::class,'acceptRequest']);

Route::delete('/removefriend/{user_id}/{friend_id}', [FriendController::class,'rejectRequest']);

//route for isfriend
 Route::get('/isfriend/{user_id}/{friend_id}', [FriendController::class,'isFriend']);

 Route::get('/friendsposts/{id}', [FriendController::class,'getFriendsPosts']);

 Route::get('/postoffriends/{id}', [FriendController::class,'PostOfFriends']);


 //routes for bio

 Route::get('/getbio/{id}', [BioController::class,'getBioOfUser']);
 
 Route::post('/updatebio/{id}', [BioController::class,'updateBio']);
 
 Route::post('/addbio', [BioController::class,'addBio']);
 
 
 //--------------------------------------------------------------------
 //post api
 Route::get("list", [PostController::class, 'list']);
Route::get("posts/{id}", [PostController::class, 'show']);
Route::post("add", [PostController::class, 'create']);
Route::post("update/{id}", [PostController::class, 'update']);
Route::get("delete/{id}", [PostController::class, 'destroy']);

//----------------------------------------------------------------------
//report api
Route::get('/PostById/{id}',"PostController@show");
Route::get("list", [PostController::class, 'index']);
Route::post("add", [PostController::class, 'create']);


Route::post('/stores', [ReportController::class, 'store']);


Route::get('/reports', [ReportController::class, 'index']);


Route::post('/reportedposts', [PostController::class, 'store']);
Route::post('/isReported', 'ReportController@isReported');

//routes for login and registration

Route::get("display/{id}", [UserController::class, 'display']);
Route::post("login", [UserController::class, 'login']);
Route::post("register", [UserController::class, 'register']);
Route::get("logout", [UserController::class, 'logout']);
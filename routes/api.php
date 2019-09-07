<?php

use Illuminate\Http\Request;

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
Route::post('/register', 'RegisterLogin@RLogin');
Route::post('/login', 'RegisterLogin@RLogin');
Route::post('profile', 'userController@profiles');
Route::post('profile_email', 'userController@profiles_email');
Route::post('/deleteuser', 'adminController@deleteUsers');
Route::post('/deletecats', 'adminController@deleteCategory');
Route::post('/forget_user', 'userController@forgetpsw');
Route::post('/deleteContact', 'adminController@deleteContact');
Route::post('/deleteInstructor', 'adminController@deleteInstructor');
Route::post('/deleteCourse', 'adminController@deleteCourse');
Route::post('/deleteSpecialization', 'adminController@deleteSpecialization');
Route::post('/deleteMaster', 'adminController@deleteMaster');

Route::post('/subscribe-delet','contentController@deletsubscrib');
Route::post('/subscrib','contentController@subscrib');
Route::post('/deleteQuiz', 'adminController@deleteQuiz');
Route::post('/selectCategory', 'contentController@selectCategory');


//Route::post('/subscribe-delet','contentController@deletsubscrib');
//Route::post('/subscrib','contentController@subscrib');

//Route::post('/deleteQuiz', 'adminController@deleteQuiz');

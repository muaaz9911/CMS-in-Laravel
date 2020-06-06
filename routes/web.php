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

// Default routes

Route::get('/', function () {
    return view('home');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


/////////////////////////////////////////////////////////////////////////


Route::get('/admin', function () {
    return view('admin/index');
});




// Route::get('user/photo', function () {
//     $roless = App\User::find('1');
//     return $roless->photo->file;
// });



 Route::group(['middleware'=>'admin'], function(){

    Route::resource('/admin/users', 'adminUsersController');
    Route::resource('/admin/posts', 'adminPostsController');
    Route::resource('/admin/categories', 'adminCategoryController');
    Route::resource('/admin/comments', 'PostCommentsController');
 });

 Route::get('/post/{id}', 'PostCommentsController@post');


Route::get('isadmin', function () {
    $role = App\User::find('36');
    return $role->isAdmin();
});
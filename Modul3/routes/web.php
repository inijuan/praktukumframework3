<?php

use App\Http\Controllers\RouteController;
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

Route::get('/routing', function() {
    return view('routing');
});

Route::get('/basic_routing', function(){
    return 'Hello world';
});

Route::view('/view_route', 'view_route');
Route::view('/view_route', 'view_route', ['name' => 'Purnama']);

Route::get('/controller_route', [RouteController::class, 'index']);

Route::Redirect('/', '/routing');

Route::get('/user/{id}', function($id) {
    return "User Id: ".$id;
});
Route::get('/posts/{post}/comments/{comment}', function($postId, $commentId) {
    return "post Id: ".$postId. ", Comment Id: ".$commentId; 
});

Route::get('username/{name?}', function($name = null) {
    return 'Username: '.$name;
});

Route::get('/title/{title?}', function($title = framework) {
    return "Title: ".$title;
})->where('title', '[A-Za-z]+');

Route::get('/profile/{profileId}', [RouteController::class, 'profile'])->name('profileRouteName');


// Route::get('/route_priority/{rpId}', function($rpId) {
//     return "This is Route One";
// });
Route::get('/route_priority/user', function() {
    return "This is Route 1";
});
Route::get('/route_priority/user', function() {
    return "This is Route 2";
});

Route::fallback(function(){
    return "This is Fallback Route";
});

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/dashboard', function() {
        return "This is admin dashboard";
    })->name('dashboard');
    Route::get('/user', function() {
        return "This is user data on admin page";
    })->name('users');
    Route::get('/items', function() {
        return "This is item data on admin page";
    })->name('items');
});

Route::view('/clone_website', 'clone_website');
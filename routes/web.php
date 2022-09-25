<?php
//e.g form django.contib,contrib import etc
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\dashboardController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes/Urls(django)
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');

//Route::post('/logout', [LogoutController::class, 'logout'])->middleware('auth');
Auth::routes();
Route::group(['middleware'=>'preventbackafterlogout'],function()
{
	Route::get('/about', [PagesController::class,'about'])->name('Aboutpage');
	Route::get('/services', [PagesController::class,'services']);
	Route::get('/contactus', [PagesController::class,'contactus']);

	//creates all routes from the contact controller
	//use resource route when create the controller
	Route::resource('/contact',ContactController::class);
	Route::get('/search_contact', [ContactController::class,'search_contact']);
	Route::get('/dashboard', [App\Http\Controllers\dashboardController::class, 'index']);
});


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\AddServicesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/registrationForm', 'register')->name('register');
    Route::post('/registrationForm', 'store')->name('store');
    Route::get('/', 'dashboard')->name('welcome');
    Route::get('/admin/index', 'adminWelcome')->name('adminWelcome');
    Route::get('/admin/addServices', 'addServicesView')->name('addServices');
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authentication')->name('authentication');
    Route::get('/logout', 'logout')->name('logout');
});
Route::controller(AddServicesController::class)->group(function() {
    Route::post('/addServices', 'storeServices')->name('storeServices');
    Route::get('/admin/addServices/update/id', 'addServicesView')->name('addServices');
    Route::get('/serviceList', 'viewService')->name('serviceList');
    Route::get('/serviceList/delete/{id}', 'deleteService')->name('serviceListDelete');
    Route::get('/serviceList/edit/{id}', 'editService')->name('serviceListEdit');
});
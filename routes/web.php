<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\AddServicesController;
use App\Http\Controllers\ServiceProvideController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\ContactController;
use Laravel\Socialite\Facades\Socialite;

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
Route::get('/send-mail', [SendMailController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store'])->name('contactDetail');
Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/registrationForm', 'register')->name('register');
    Route::post('/registrationForm', 'store')->name('store');
    Route::get('/', 'dashboard')->name('welcome');
    Route::get('/admin/index', 'adminWelcome')->name('adminWelcome');
    Route::get('/admin/addServices', 'addServicesView')->name('addServices');
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authentication')->name('authentication');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/auth/{provider}/redirect', 'redirect')->name('redirectLogin');
    Route::get('/auth/{provider}/callback', 'callback')->name('callbackLogin');
    Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify');
});
Route::controller(AddServicesController::class)->group(function() {
    Route::post('/addServices', 'storeServices')->name('storeServices');
    Route::post('/admin/addServices/update/{id}', 'updateServicesView')->name('updateServices');
    Route::get('/serviceList', 'viewService')->name('serviceList');
    Route::get('/serviceList/delete/{id}', 'deleteService')->name('serviceListDelete');
    Route::get('/serviceList/edit/{id}', 'editService')->name('serviceListEdit');
});
Route::controller(ServiceProvideController::class)->group(function() {
    Route::get('/admin/addProvider', 'addProviderView')->name('addProvider');
    Route::post('/addProvider', 'storeProvider')->name('storeProvider');
    Route::get('/providerList', 'viewProvider')->name('providerList');
    Route::get('/providerList/edit/{id}', 'editProvider')->name('providerListEdit');
    Route::post('/admin/addProvider/update/{id}', 'updateProviderView')->name('updateProvider');
    Route::get('/providerList/delete/{id}', 'deleteProvider')->name('ProviderListDelete');
});
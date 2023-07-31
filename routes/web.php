<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');
// files
Route::resource('files', FileController::class);
//shwo all invoices related to file
Route::get('/files/files/{file}', [FileController::class, 'files'])->name('files.files');
//searsh using phone number
Route::post('/search', [SearchController::class, 'index'])->name('search.index');
// invoices
Route::resource('invoices', InvoiceController::class);
//delete multi invoices
Route::delete('invoices/destroyMultiple', [InvoiceController::class, 'destroyMultiple'])->name('invoices.destroyMultiple');
Auth::routes();


Auth::routes();




Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

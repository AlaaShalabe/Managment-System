<?php

use App\Http\Controllers\FileController;
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

Route::get('/', [FileController::class, 'index']);
// files
Route::post('/search', [SearchController::class, 'index'])->name('search.index');
Route::get('/files', [FileController::class, 'index'])->name('files.index');
Route::get('/files/create', [FileController::class, 'create'])->name('files.create');
Route::post('/files/store', [FileController::class, 'store'])->name('files.store');
Route::get('/files/edit/{file}', [FileController::class, 'edit'])->name('files.edit');
Route::put('/files/update/{file}', [FileController::class, 'update'])->name('files.update');
Route::get('/files/show/{file}', [FileController::class, 'show'])->name('files.show');
Route::get('/files/files/{file}', [FileController::class, 'files'])->name('files.files');
Route::delete('/files/delete/{file}', [FileController::class, 'destroy'])->name('files.destroy');
// invoices
Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');
Route::post('/invoices/store', [InvoiceController::class, 'store'])->name('invoices.store');
Route::get('/invoices/edit/{invoice}', [InvoiceController::class, 'edit'])->name('invoices.edit');
Route::put('/invoices/update/{invoice}', [InvoiceController::class, 'update'])->name('invoices.update');
Route::get('/invoices/show/{invoice}', [InvoiceController::class, 'show'])->name('invoices.show');
Route::delete('/invoices/delete/{invoice}', [InvoiceController::class, 'destroy'])->name('invoices.destroy');
Route::delete('invoices/destroyMultiple', [InvoiceController::class, 'destroyMultiple'])->name('invoices.destroyMultiple');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::get('/icon', function () {
    return view('pages.icons');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

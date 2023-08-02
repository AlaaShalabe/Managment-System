<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
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
Route::get('/files/invoices/{file}', [FileController::class, 'invoices'])->name('files.files');
//searsh using phone number
Route::post('/search', [SearchController::class, 'index'])->name('search.index');
// invoices
Route::resource('invoices', InvoiceController::class, ['except' => ['create', 'store']]);
Route::delete('invoices/destroyMultiple', [InvoiceController::class, 'destroyMultiple'])->name('invoices.destroyMultiple');

Route::get('invoices/create/{file}', [InvoiceController::class, 'create'])->name('invoices.create');
Route::get('invoices/indax/{file}', [InvoiceController::class, 'index'])->name('invoices');
Route::post('invoices/store/{file}', [InvoiceController::class, 'store'])->name('invoices.store');
//delete multi invoices

Auth::routes();

Route::get('/icons', function () {
    return view('pages.icons');
});
Auth::routes();

Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);

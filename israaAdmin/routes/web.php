<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\PageController;

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


Auth::routes();
Route::middleware([Authenticate::class])->group(function () {

    // Route::get('/', function () {
    //     return view('backend.index');
    // })->name('admin');
    Route::get('/', [App\Http\Controllers\PageController::class, 'statisque'])->name('admin');
});
    //hotelsController
// Route::resource('hotels', App\Http\Controllers\hotelsController::class);
// Route::POST('/MiseAjourTypeEvenement', [App\Http\Controllers\TypeEvenementController::class, 'update2'])->name('MiseAjourTypeEvenement');


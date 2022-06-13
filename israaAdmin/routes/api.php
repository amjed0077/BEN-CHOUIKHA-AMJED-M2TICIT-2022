<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\voyageController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\CircuitController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\ArrangmentController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('voyages', voyageController::class);
Route::post('voyages/update2', [voyageController::class, 'update2'])->name('voyages.update2');

Route::apiResource('hotels', HotelController::class);
Route::post('hotels/update2', [HotelController::class, 'update2'])->name('hotels.update2');

Route::apiResource('circuits', CircuitController::class);
Route::post('circuits/update2', [CircuitController::class, 'update2'])->name('circuits.update2');

Route::apiResource('events', EventController::class);
Route::post('events/update2', [EventController::class, 'update2'])->name('events.update2');

Route::apiResource('reservations', ReservationController::class);
Route::post('reservations/update2', [ReservationController::class, 'update2'])->name('reservations.update2');
Route::get('reservations/confirmer/{id}', [ReservationController::class, 'Confirmer'])->name('reservations.Confirmer');
Route::get('reservations/annuler/{id}', [ReservationController::class, 'annuler'])->name('reservations.annuler');

Route::apiResource('arrangements', ArrangmentController::class);
Route::get('/mobile/arrangementss/{id}', [ArrangmentController::class, 'getArrangment'])->name('getArrangment');
//Route::post('arrangements/update2', [ArrangmentController::class, 'update2'])->name('arrangements.update2');
//mobile

Route::get('/mobile/voyages', [MobileController::class, 'voyages'])->name('voyages.list');
Route::get('/mobile/events', [MobileController::class, 'events'])->name('events.list');
Route::get('/mobile/circuits', [MobileController::class, 'circuits'])->name('circuits.list');
Route::get('/mobile/hotels', [MobileController::class, 'hotels'])->name('hotels.list');
Route::post('/mobile/login', [MobileController::class, 'login'])->name('mobile.mobile');
Route::post('/mobile/register', [MobileController::class, 'register'])->name('mobile.mobile');
Route::get('/mobile/reservationsUser/{id}', [MobileController::class, 'ReservationsUser'])->name('reservationUser.mobile');
Route::get('/mobile/filtre/{type}/{date}', [MobileController::class, 'filtre'])->name('reservationUser.filtre');

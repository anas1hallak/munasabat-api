<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\adminsController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
 */

Route::post('/register', [usersController::class, 'store']);
Route::get('/ShowUser/{id}', [usersController::class, 'show']);
Route::put('/EditUser/{id}', [usersController::class, 'update']);
Route::delete('/DeleteUser/{id}', [usersController::class, 'destroy']);


Route::post('/makeRoom/{id}', [roomsController::class, 'store']);
Route::get('/ShowRoom/{id}', [roomsController::class, 'show']);
Route::put('/EditRoom/{id}', [roomsController::class, 'update']);
Route::delete('/DeleteRoom/{id}', [roomsController::class, 'destroy']);


Route::get('/ShowAllHalls', [hallsController::class, 'index']);
Route::post('/makeHall', [hallsController::class, 'store']);
Route::get('/ShowHall/{id}', [hallsController::class, 'show']);
Route::put('/EditHall/{id}', [hallsController::class, 'update']);
Route::delete('/DeleteHall/{id}', [hallsController::class, 'destroy']);


Route::post('/book/{id}', [bookingController::class, 'store']);
Route::get('/ShowHallBookings/{id}', [bookingController::class, 'hallbookings']);
Route::get('/ShowUserBookings/{id}', [bookingController::class, 'userbookings']);
Route::put('/EditBooking/{id}', [bookingController::class, 'update']);
Route::delete('/DeleteBooking/{id}', [bookingController::class, 'destroy']);



Route::post('/makeAdmin', [adminsController::class, 'store']);


Route::post('/login', [usersController::class, 'login']);
Route::post('/logout', [usersController::class, 'logout']);

Route::post('/DashboardLogin', [AuthController::class, 'dashboardLogin']);
Route::post('/DashboardLogout', [AuthController::class, 'logout']);

Route::get('/allServices', [serviceController::class, 'AllServices']);
Route::get('/hallServices/{id}', [serviceController::class, 'hallServices']);

Route::post('/addServices/{id}', [serviceController::class, 'store']);



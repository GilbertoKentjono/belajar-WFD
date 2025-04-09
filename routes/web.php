<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FlightController;
use App\Http\Controllers\TicketController;

Route::get('/', [FlightController::class, 'index']);
Route::get('/flights/book/{id}', [FlightController::class, 'book']);
Route::get('/flights/ticket/{id}', [FlightController::class, 'showTickets']);

Route::post('/ticket/submit', [TicketController::class, 'store']);
Route::put('/ticket/board/{id}', [TicketController::class, 'board']);
Route::delete('/ticket/delete/{id}', [TicketController::class, 'destroy']);


<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    // Menampilkan semua penerbangan
    public function index()
    {
        $flights = Flight::all();
        return view('flights.index')->with('flights', $flights);
    }

    // Form pemesanan tiket untuk flight tertentu
    public function book($id)
    {
        $flight = Flight::findOrFail($id);
        return view('tickets.create')->with('flight', $flight);
    }

    // Menampilkan daftar tiket untuk flight tertentu
    public function showTickets($id)
    {
        $flight = Flight::with('tickets')->findOrFail($id);
        return view('tickets.index')->with('flight', $flight);
    }
}

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

    public function edit($id)
    {
        $flight = Flight::findOrFail($id);
        return view('flights.edit', compact('flight'));
    }
    public function update(Request $request, $id)
    {
        $flight = Flight::findOrFail($id);
    
        // Validasi input
        $request->validate([
            'flight_code' => 'required|string|max:5',
            'origin' => 'required|string|max:3',
            'destination' => 'required|string|max:3',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date',
        ]);
    
        // Update data flight
        $flight->update([
            'flight_code' => $request->flight_code,
            'origin' => $request->origin,
            'destination' => $request->destination,
            'departure_time' => $request->departure_time,
            'arrival_time' => $request->arrival_time,
        ]);
    
        return redirect()->route('flights.index')->with('success', 'Penerbangan berhasil diperbarui!');
    }
    
}
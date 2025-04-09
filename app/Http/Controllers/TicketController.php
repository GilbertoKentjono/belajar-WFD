<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Flight;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TicketController extends Controller
{
    // Proses simpan tiket
    public function store(Request $request)
    {
        $request->validate([
            'flight_id' => 'required|exists:flights,id',
            'passenger_name' => 'required|string',
            'passenger_phone' => 'required|string|max:14',
            'seat_number' => 'required|string|max:3',
        ]);

        Ticket::create([
            'flight_id' => $request->flight_id,
            'passenger_name' => $request->passenger_name,
            'passenger_phone' => $request->passenger_phone,
            'seat_number' => $request->seat_number,
        ]);

        return redirect('/')->with('success', 'Tiket berhasil dipesan!');
    }

    // Proses boarding tiket
    public function board($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->update([
            'is_boarding' => 1,
            'boarding_time' => Carbon::now(),
        ]);

        return back()->with('success', 'Boarding berhasil!');
    }

    // Proses hapus tiket (jika belum boarding)
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);

        if ($ticket->is_boarding) {
            return back()->with('error', 'Tiket sudah boarding dan tidak bisa dihapus!');
        }

        $ticket->delete();
        return back()->with('success', 'Tiket berhasil dihapus.');
    }
}

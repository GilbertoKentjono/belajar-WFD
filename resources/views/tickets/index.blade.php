@extends('layout')

@section('content')
    <h2 class="text-xl font-bold mb-4">Tiket untuk {{ $flight->flight_code }}</h2>

    <a href="{{ url('/') }}" class="inline-block mb-4 text-blue-600 hover:underline">&larr; Kembali ke Daftar Penerbangan</a>

    <table class="w-full table-auto border-collapse">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">Nama</th>
                <th class="border px-4 py-2">No HP</th>
                <th class="border px-4 py-2">No Kursi</th>
                <th class="border px-4 py-2">Boarding</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($flight->tickets as $ticket)
                <tr>
                    <td class="border px-4 py-2">{{ $ticket->passenger_name }}</td>
                    <td class="border px-4 py-2">{{ $ticket->passenger_phone }}</td>
                    <td class="border px-4 py-2">{{ $ticket->seat_number }}</td>
                    <td class="border px-4 py-2">
                        {{ $ticket->is_boarding ? $ticket->boarding_time : 'Belum' }}
                    </td>
                    <td class="border px-4 py-2 space-x-2">
                        @if(!$ticket->is_boarding)
                        <form method="POST" action="{{ url('/ticket/board/'.$ticket->id) }}" class="inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="text-blue-600 hover:underline">Boarding</button>
                        </form>
                        <form method="POST" action="{{ url('/ticket/delete/'.$ticket->id) }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                        @else
                            <span class="text-gray-500 italic">Selesai</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

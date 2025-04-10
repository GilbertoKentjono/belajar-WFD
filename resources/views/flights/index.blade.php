@extends('layout')

@section('content')
    <h2 class="text-xl font-bold mb-4">Daftar Penerbangan</h2>
    <ul class="space-y-2">
        @foreach($flights as $flight)
            <li class="border p-4 rounded hover:bg-gray-100">
                <div class="flex justify-between items-center">
                    <div>
                        <p><strong>Kode:</strong> {{ $flight->flight_code }}</p>
                        <p><strong>Dari:</strong> {{ $flight->origin }} → <strong>Ke:</strong> {{ $flight->destination }}</p>
                        <p><strong>Jam:</strong> {{ $flight->departure_time }} - {{ $flight->arrival_time }}</p>
                    </div>
                    <div class="space-x-2">
                    <button onclick="window.location='{{ url('/flights/book/'.$flight->id) }}'" class="text-blue-600 hover:text-blue-700 bg-transparent border border-blue-600 py-2 px-4 rounded focus:outline-none">
                        Pesan Tiket
                    </button>
                    <button onclick="window.location='{{ url('/flights/ticket/'.$flight->id) }}'" class="text-green-600 hover:text-green-700 bg-transparent border border-green-600 py-2 px-4 rounded focus:outline-none">
                        Lihat Tiket
                    </button>
                    <button onclick="window.location='{{ url('/flights/edit/'.$flight->id) }}'" class="text-yellow-600 hover:text-yellow-700 bg-transparent border border-yellow-600 py-2 px-4 rounded focus:outline-none">
                        Edit
                    </button>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@endsection

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
                        <a href="{{ url('/flights/book/'.$flight->id) }}" class="text-blue-600 hover:underline">Pesan Tiket</a>
                        <a href="{{ url('/flights/ticket/'.$flight->id) }}" class="text-green-600 hover:underline">Lihat Tiket</a>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@endsection

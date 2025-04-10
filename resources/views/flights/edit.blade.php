@extends('layout')

@section('content')
    <h2 class="text-xl font-bold mb-4">Edit Penerbangan</h2>

    <form action="{{ route('flights.update', $flight->id) }}" method="POST" class="space-y-4">
        @csrf
        <input type="hidden" name="_method" value="POST">

        <div>
            <label for="flight_code" class="block">Kode Penerbangan:</label>
            <input type="text" name="flight_code" id="flight_code" value="{{ old('flight_code', $flight->flight_code) }}" class="border p-2 w-full" required>
        </div>

        <div>
            <label for="origin" class="block">Dari (Bandara Asal):</label>
            <input type="text" name="origin" id="origin" value="{{ old('origin', $flight->origin) }}" class="border p-2 w-full" required>
        </div>

        <div>
            <label for="destination" class="block">Tujuan (Bandara Tujuan):</label>
            <input type="text" name="destination" id="destination" value="{{ old('destination', $flight->destination) }}" class="border p-2 w-full" required>
        </div>

        <div>
            <label for="departure_time" class="block">Waktu Keberangkatan:</label>
            <input type="datetime-local" name="departure_time" id="departure_time" value="{{ old('departure_time', \Carbon\Carbon::parse($flight->departure_time)->format('Y-m-d\TH:i')) }}" class="border p-2 w-full" required>
        </div>

        <div>
            <label for="arrival_time" class="block">Waktu Kedatangan:</label>
            <input type="datetime-local" name="arrival_time" id="arrival_time" value="{{ old('arrival_time', \Carbon\Carbon::parse($flight->arrival_time)->format('Y-m-d\TH:i')) }}" class="border p-2 w-full" required>
            </div>

        <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded">Update Penerbangan</button>
    </form>
    
    <button onclick="window.location='{{ url('/') }}'" class="inline-block mt-4 mb-4 text-blue-600 hover:text-blue-700 bg-transparent border border-blue-600 py-2 px-4 rounded focus:outline-none">
    &larr; Kembali ke Daftar Penerbangan
</button>
@endsection

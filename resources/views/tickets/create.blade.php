@extends('layout')

@section('content')
    <h2 class="text-xl font-bold mb-4">Pesan Tiket untuk {{ $flight->flight_code }}</h2>

    <a href="{{ url('/') }}" class="inline-block mb-4 text-blue-600 hover:underline">&larr; Kembali ke Daftar Penerbangan</a>

    <form action="{{ url('/ticket/submit') }}" method="POST" class="space-y-4">
        @csrf
        <input type="hidden" name="flight_id" value="{{ $flight->id }}">

        <div>
            <label>Nama:</label>
            <input type="text" name="passenger_name" class="border p-2 w-full" required>
        </div>

        <div>
            <label>No HP:</label>
            <input type="text" name="passenger_phone" class="border p-2 w-full" maxlength="14" required>
        </div>

        <div>
            <label>No Kursi:</label>
            <input type="text" name="seat_number" class="border p-2 w-full" maxlength="3" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Pesan</button>
        @if($errors->any())
    <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    </form>
@endsection

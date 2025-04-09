<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    // Agar field dapat diisi (mass assignment)
    protected $fillable = [
        'flight_code',
        'origin',
        'destination',
        'departure_time',
        'arrival_time',
    ];

    // Relasi: One-to-Many (Satu flight punya banyak tiket)
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}

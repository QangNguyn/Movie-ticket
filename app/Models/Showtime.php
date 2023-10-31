<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    use HasFactory;
    protected $table = 'showtimes';
    protected $fillable = ['slug', 'movie_id', 'room_id', 'start_time', 'end_time'];

    protected $casts = [
        'start_time' => 'datetime:Y-m-d H:i'
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}

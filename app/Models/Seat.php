<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;
    protected $table = 'seats';
    protected $fillable = ['row', 'column', 'status', 'room_id'];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}

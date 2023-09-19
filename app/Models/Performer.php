<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Performer extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'performer_movies')->withTimestamps();
    }
}

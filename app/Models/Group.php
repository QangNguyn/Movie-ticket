<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'user_id', 'permissions'];
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

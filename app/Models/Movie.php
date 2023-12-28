<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug', 'name', 'duration', 'banner', 'link_trailer', 'director_id', 'description', 'coming_soon'
    ];
    public function director()
    {
        return $this->belongsTo(Director::class);
    }
    public function performers()
    {
        return $this->belongsToMany(Performer::class, 'performer_movies')->withTimestamps();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_movies')->withTimestamps();
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}

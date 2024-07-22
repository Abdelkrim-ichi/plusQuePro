<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'movie_id',
        'title',
        'overview',
        'poster_path',
        'release_date',
        'vote_average',
        'popularity',
        'original_language',
        'original_title',
        'backdrop_path',
        'video',
        'adult',
        'vote_count',
        'genre_ids',
        'media_type',
    ];

    protected $casts = [
        'genre_ids' => 'array',
        'release_date' => 'datetime',
    ];

    public function scopeSearch($query, $value){
        $query->where("title", "like", "%{$value}%");
    }
}

<?php

namespace App\Models;

use App\Filament\Resources\LearnSerieResource\Enums\SerieLevel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearnContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'language',
        'difficulty',
        'source',
        'content',
        'cover_url',
        'source_url',
        'series_id',
    ];

    protected $casts = [
        'difficulty' => SerieLevel::class
    ];
}

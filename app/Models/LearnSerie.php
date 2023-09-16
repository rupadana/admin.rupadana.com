<?php

namespace App\Models;

use App\Filament\Resources\LearnSerieResource\Enums\SerieLevel;
use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LearnSerie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'is_new',
        'image_id',
        'is_show',
        'level',
    ];

    protected $casts = [
        'level' => SerieLevel::class,
        'is_new' => 'boolean',
        'is_show' => 'boolean',
    ];

    public function image(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'image_id');
    }

    public function learn_contents(): HasMany
    {
        return $this->hasMany(LearnContent::class, 'series_id');
    }
}

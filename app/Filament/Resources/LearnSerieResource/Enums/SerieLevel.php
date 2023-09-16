<?php

namespace App\Filament\Resources\LearnSerieResource\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum SerieLevel: string implements HasColor, HasLabel
{
    case Beginner = 'beginner';
    case Intermediate = 'intermediate';
    case Advanced = 'advanced';
    case AllLevels = 'all-levels';

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Beginner => 'warning',
            self::Intermediate => 'info',
            self::Advanced => 'success',
            self::AllLevels => 'secondary',
        };
    }

    public function getLabel(): string
    {
        return match ($this) {
            self::Beginner => 'Beginner',
            self::Intermediate => 'Intermediate',
            self::Advanced => 'Advanced',
            self::AllLevels => 'All Levels',
        };
    }

    public function getOptions(): array
    {
        return [
            self::Beginner => 'Beginner',
            self::Intermediate => 'Intermediate',
            self::Advanced => 'Advanced',
            self::AllLevels => 'All Levels',
        ];
    }
}

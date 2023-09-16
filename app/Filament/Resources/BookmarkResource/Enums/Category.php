<?php

namespace App\Filament\Resources\BookmarkResource\Enums;

use Filament\Support\Contracts\HasLabel;

enum Category: string implements HasLabel
{
    case Inspirasi = 'inspirasi';
    case Artikel = 'artikel';
    case Tools = 'tools';
    case Video = 'video';
    case Portofolio = 'portofolio';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Inspirasi => 'inspirasi',
            self::Artikel => 'artikel',
            self::Tools => 'tools',
            self::Video => 'video',
            self::Portofolio => 'portofolio',
        };
    }
}

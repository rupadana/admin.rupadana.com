<?php

namespace App\Filament\Resources\LearnSerieResource\Pages;

use App\Filament\Resources\LearnSerieResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLearnSeries extends ListRecords
{
    protected static string $resource = LearnSerieResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

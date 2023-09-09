<?php

namespace App\Filament\Resources\LearnContentResource\Pages;

use App\Filament\Resources\LearnContentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLearnContent extends EditRecord
{
    protected static string $resource = LearnContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

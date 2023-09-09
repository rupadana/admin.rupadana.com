<?php

namespace App\Filament\Resources\LearnSerieResource\RelationManagers;

use App\Filament\Resources\LearnContentResource;
use Filament\Tables\Actions\CreateAction;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class LearnContentsRelationManager extends RelationManager
{
    protected static string $relationship = 'learn_contents';

    public function form(Form $form): Form
    {
        return LearnContentResource::form($form);
    }

    public function table(Table $table): Table
    {
        return LearnContentResource::table($table)
        ->headerActions([
            CreateAction::make()
        ]);
    }
}

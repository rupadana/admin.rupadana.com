<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LearnContentResource\Pages;
use App\Filament\Resources\LearnContentResource\RelationManagers;
use App\Filament\Resources\LearnSerieResource\Enums\SerieLevel;
use App\Models\LearnContent;
use Filament\Forms;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LearnContentResource extends Resource
{
    protected static ?string $model = LearnContent::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->live(true)
                    ->afterStateUpdated(function (Set $set, Get $get, $state): void {

                        $set(
                            'slug',
                            str($get('title'))
                                ->lower()
                                ->explode(' ')
                                ->implode('-')
                        );
                    })
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('content')
                    ->columnSpanFull()
                    ->rows(10)
                    ->required(),
                TextInput::make('category')
                    ->required(),
                Radio::make('difficulty')
                    ->options(SerieLevel::class)
                    ->columnSpanFull()
                    ->required(),
                TextInput::make('language')
                    ->required(),
                TextInput::make('source'),
                TextInput::make('cover_url'),
                TextInput::make('source_url'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('category'),
                TextColumn::make('difficulty')
                    ->badge(),
                TextColumn::make('language'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLearnContents::route('/'),
            'create' => Pages\CreateLearnContent::route('/create'),
            'edit' => Pages\EditLearnContent::route('/{record}/edit'),
        ];
    }

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }
}

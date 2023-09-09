<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LearnSerieResource\Api\Transformers\LearnSerieTransformer;
use App\Filament\Resources\LearnSerieResource\Enums\SerieLevel;
use App\Filament\Resources\LearnSerieResource\Pages;
use App\Filament\Resources\LearnSerieResource\RelationManagers;
use App\Filament\Resources\LearnSerieResource\RelationManagers\LearnContentsRelationManager;
use App\Models\LearnSerie;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LearnSerieResource extends Resource
{
    protected static ?string $model = LearnSerie::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getApiTransformer()
    {
        return LearnSerieTransformer::class;
    }

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
                    }),
                TextInput::make('slug'),
                Textarea::make('description')
                    ->rows(5)
                    ->columnSpanFull(),

                CuratorPicker::make('image_id')
                    ->label('Image')
                    ->relationship('image', 'id')
                    ->columnSpanFull(),

                Radio::make('level')
                    ->options(SerieLevel::class)
                    ->columnSpanFull(),
                Toggle::make('is_new')->default(true),
                Toggle::make('is_show')->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('level')
                    ->badge(),
                ToggleColumn::make('is_new'),
                ToggleColumn::make('is_show'),
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
            LearnContentsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLearnSeries::route('/'),
            'create' => Pages\CreateLearnSerie::route('/create'),
            'edit' => Pages\EditLearnSerie::route('/{record}/edit'),
        ];
    }
}

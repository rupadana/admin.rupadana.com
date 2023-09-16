<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookmarkResource\Enums\Category;
use App\Filament\Resources\BookmarkResource\Pages;
use App\Models\Bookmark;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BookmarkResource extends Resource
{
    protected static ?string $model = Bookmark::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('title')
                    ->required(),
                TextInput::make('description')
                    ->required(),
                Radio::make('category')
                    ->options(Category::class)
                    ->required(),
                TextInput::make('url')
                    ->required(),
                TextInput::make('image')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('description'),
                TextColumn::make('category'),
                TextColumn::make('url'),
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
            'index' => Pages\ListBookmarks::route('/'),
            'create' => Pages\CreateBookmark::route('/create'),
            'edit' => Pages\EditBookmark::route('/{record}/edit'),
        ];
    }
}

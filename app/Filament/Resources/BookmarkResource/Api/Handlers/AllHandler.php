<?php
namespace App\Filament\Resources\BookmarkResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\BookmarkResource;
use Spatie\QueryBuilder\QueryBuilder;

class AllHandler extends Handlers {
    public static string | null $uri = '/all';
    public static string | null $resource = BookmarkResource::class;


    public function handler()
    {
        $model = static::getModel();

        $query = QueryBuilder::for($model)
            ->allowedFields($model::$allowedFields ?? [])
            ->allowedFilters($model::$allowedFilters ?? [])
            ->get();

        return static::getApiTransformer()::collection($query);
    }
}
<?php

namespace App\Filament\Resources\LearnContentResource\Api\Handlers;

use App\Filament\Resources\LearnContentResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;

class PaginationHandler extends Handlers
{
    public static ?string $uri = '/';

    public static ?string $resource = LearnContentResource::class;

    public function handler()
    {
        $model = static::getModel();

        $query = QueryBuilder::for($model)
            ->allowedFields($model::$allowedFields ?? [])
            ->allowedFilters($model::$allowedFilters ?? [])
            ->paginate(request()->query('per_page'))
            ->appends(request()->query());

        return static::getApiTransformer()::collection($query);
    }
}

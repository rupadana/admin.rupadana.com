<?php

namespace App\Filament\Resources\LearnContentResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\LearnContentResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}/{content_slug}';
    public static string | null $resource = LearnContentResource::class;

    protected static string $keyName = 'learn_contents.slug';

    public function handler($id, $content_slug)
    {
        $model = static::getModel()::query();

        $query = QueryBuilder::for(
            $model
                ->join('learn_series', 'learn_series.id', 'series_id')
                ->where(static::getKeyName(), $content_slug)
                ->where('learn_series.slug', $id)
        )
            ->first();

        if (!$query) return static::sendNotFoundResponse();

        $transformer = static::getApiTransformer();

        return new $transformer($query);
    }
}

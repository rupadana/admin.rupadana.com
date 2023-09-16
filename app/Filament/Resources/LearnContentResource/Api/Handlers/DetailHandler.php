<?php

namespace App\Filament\Resources\LearnContentResource\Api\Handlers;

use App\Filament\Resources\LearnContentResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;

class DetailHandler extends Handlers
{
    public static ?string $uri = '/{id}/{content_slug}';

    public static ?string $resource = LearnContentResource::class;

    protected static string $keyName = 'learn_contents.slug';

    public function handler($id, $content_slug)
    {
        $model = static::getModel()::query();

        $query = QueryBuilder::for(
            $model
                ->select([
                    'learn_series.id as idLearn',
                    'learn_series.slug as slugLearn',
                    'learn_series.title as titleLearn',
                    'learn_series.description as descriptionLearn',
                    'learn_contents.*',
                ])
                ->join('learn_series', 'learn_series.id', 'series_id')
                ->where(static::getKeyName(), $content_slug)
                ->where('learn_series.slug', $id)
        )
            ->first();

        if (! $query) {
            return static::sendNotFoundResponse();
        }

        $transformer = static::getApiTransformer();

        return new $transformer($query);
    }
}

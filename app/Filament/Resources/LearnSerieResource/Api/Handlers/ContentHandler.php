<?php

namespace App\Filament\Resources\LearnSerieResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\LearnSerieResource;
use Spatie\QueryBuilder\QueryBuilder;

class ContentHandler extends Handlers
{
    public static string | null $uri = '/{id}/contents';
    public static string | null $resource = LearnSerieResource::class;

    protected static string $keyName = 'slug';

    public static function getMethod()
    {
        return Handlers::GET;
    }

    public static function getModel()
    {
        return static::$resource::getModel();
    }

    public function handler(Request $request, $id)
    {
        $model = static::getModel()::query();

        $query = QueryBuilder::for(
            $model->where(static::getKeyName(), $id)
        )
            ->first();

        $transformer = static::getApiTransformer();

        return response()->json([
            'data' => [
                'content' => new $transformer($query),
                'subContents' => $query->learn_contents
            ]
        ]);
    }
}

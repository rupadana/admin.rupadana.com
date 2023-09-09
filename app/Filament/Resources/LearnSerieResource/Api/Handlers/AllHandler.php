<?php

namespace App\Filament\Resources\LearnSerieResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\LearnSerieResource;

class AllHandler extends Handlers
{
    public static string | null $uri = '/all';
    public static string | null $resource = LearnSerieResource::class;

    public static function getMethod()
    {
        return Handlers::GET;
    }

    public static function getModel()
    {
        return static::$resource::getModel();
    }

    public function handler(Request $request)
    {
        $query = static::getModel()::all();

        return static::getApiTransformer()::collection($query);
    }
}

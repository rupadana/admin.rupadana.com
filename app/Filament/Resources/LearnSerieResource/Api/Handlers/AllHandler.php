<?php

namespace App\Filament\Resources\LearnSerieResource\Api\Handlers;

use App\Filament\Resources\LearnSerieResource;
use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;

class AllHandler extends Handlers
{
    public static ?string $uri = '/all';

    public static ?string $resource = LearnSerieResource::class;

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

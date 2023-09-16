<?php

namespace App\Filament\Resources\LearnSerieResource\Api;

use App\Filament\Resources\LearnSerieResource;
use Illuminate\Routing\Router;
use Rupadana\ApiService\ApiService;

class LearnSerieApiService extends ApiService
{
    protected static ?string $resource = LearnSerieResource::class;

    public static function allRoutes(Router $router)
    {
        Handlers\AllHandler::route($router);
        Handlers\ContentHandler::route($router);
    }
}

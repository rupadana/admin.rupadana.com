<?php

namespace App\Filament\Resources\BookmarkResource\Api;

use App\Filament\Resources\BookmarkResource;
use Illuminate\Routing\Router;
use Rupadana\ApiService\ApiService;

class BookmarkApiService extends ApiService
{
    protected static ?string $resource = BookmarkResource::class;

    public static function allRoutes(Router $router)
    {
        Handlers\AllHandler::route($router);
    }
}

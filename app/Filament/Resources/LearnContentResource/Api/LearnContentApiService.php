<?php

namespace App\Filament\Resources\LearnContentResource\Api;

use App\Filament\Resources\LearnContentResource;
use Illuminate\Routing\Router;
use Rupadana\ApiService\ApiService;

class LearnContentApiService extends ApiService
{
    protected static ?string $resource = LearnContentResource::class;

    public static function allRoutes(Router $router)
    {
        Handlers\UpdateHandler::route($router);
        Handlers\DeleteHandler::route($router);
        Handlers\PaginationHandler::route($router);
        Handlers\DetailHandler::route($router);
    }
}

<?php
namespace App\Filament\Resources\LearnContentResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\LearnContentResource;
use Illuminate\Routing\Router;


class LearnContentApiService extends ApiService
{
    protected static string | null $resource = LearnContentResource::class;

    public static function allRoutes(Router $router)
    {
        Handlers\UpdateHandler::route($router);
        Handlers\DeleteHandler::route($router);
        Handlers\PaginationHandler::route($router);
        Handlers\DetailHandler::route($router);
    }
}

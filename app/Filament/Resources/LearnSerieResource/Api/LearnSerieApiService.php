<?php
namespace App\Filament\Resources\LearnSerieResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\LearnSerieResource;
use Illuminate\Routing\Router;


class LearnSerieApiService extends ApiService
{
    protected static string | null $resource = LearnSerieResource::class;

    public static function allRoutes(Router $router)
    {
        Handlers\AllHandler::route($router);
        Handlers\ContentHandler::route($router);
    }
}

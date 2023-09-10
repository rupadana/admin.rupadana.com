<?php
namespace App\Filament\Resources\BookmarkResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\BookmarkResource;
use Illuminate\Routing\Router;


class BookmarkApiService extends ApiService
{
    protected static string | null $resource = BookmarkResource::class;

    public static function allRoutes(Router $router)
    {
        Handlers\AllHandler::route($router);
    }
}

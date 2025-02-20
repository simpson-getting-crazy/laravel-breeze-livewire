<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

abstract class Controller
{
    public function getAllRouteList(): array
    {
        $routes = Route::getRoutes();
        $routeList = [];

        foreach ($routes as $route) {
            $routeList[] = [
                'method' => implode('|', $route->methods()),
                'uri' => $route->uri(),
                'name' => $route->getName(),
            ];
        }

        return $routeList;
    }
}

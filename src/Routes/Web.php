<?php
namespace Natan\SimpleBlog\Routes;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy;
use \Natan\SimpleBlog\Controllers\Web as WebController;

class Web {
    // private static $controller;
    private static $router;
    public static function start($router){
        WebController::load();
        self::$router= $router;
        self::routes();
    } 
    public static function routes(){
        self::$router->get('/', function (Request $request, Response $response) {
            $response->getBody()->write(WebController::index());
            return $response;
        });
    }

}
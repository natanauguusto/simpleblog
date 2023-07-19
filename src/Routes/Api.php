<?php

namespace Natan\SimpleBlog\Routes;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy;

use \Natan\SimpleBlog\Controllers\User;
use \Natan\SimpleBlog\Controllers\Post;
use \Natan\SimpleBlog\Controllers\Comment;

class Api {
    private static $router;
    public static function start($router){
        self::$router=$router;
        self::routes();
    }

    
    public static function routes(){
        self::$router->group('/api/v1/users',function(RouteCollectorProxy $group){
            $group->get('/',User::class.":users"
            )->setName('users');
            // ->add(new RouteMiddleware())

            $group->post('/',User::class.":create"
            )->setName('createUser');

            $group->put('/{user_id}',User::class.":update"
            )->setName('updateUser');

            $group->delete('/{user_id}',User::class.":delete"
            )->setName('deleteUser');

            $group->get('/{user_id}',User::class.":show"
            )->setName('showUser');
        });
        // ->add(new GroupMiddleware());
        // self::$router->group('/api/v1/posts',function(RouteCollectorProxy $group){

        // });
    }
}
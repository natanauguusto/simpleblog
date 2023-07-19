<?php
require __DIR__."/../vendor/autoload.php";
use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use \Natan\SimpleBlog\Routes\Web;
use \Natan\SimpleBlog\Routes\Api;
$app = AppFactory::create();
$app->addErrorMiddleware(true,false,false);

Web::start($app);
Api::start($app);
$app->run();
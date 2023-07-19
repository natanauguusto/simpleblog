<?php 
namespace Natan\SimpleBlog\Controllers;
use League\Plates\Engine;
use \Natan\SimpleBlog\Models\User;

class Web {
    public static $templates;
    public static function load(){
        self::$templates = new Engine(__DIR__.'/../Theme'); 
        // self::$templates->addFolder('pages',__DIR__.'/../Theme/pages');
    }
    public static function index(){
        $user = new User();
        // var_dump($user->find()->count());
        return self::$templates->render('pages/site/index');
    }
}
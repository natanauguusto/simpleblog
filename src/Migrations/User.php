<?php
namespace Natan\SimpleBlog\Migrations;
use CoffeeCode\DataLayer\Connect;
class User {
    private $connect ;
    public function __construct(){
        $this->connect= Connect::getInstance(\DATA_LAYER_CONFIG);
    }
    public function up(){
        $sql = getFileSQL('users');
        $this->connect->prepare($sql)->execute();
    }
    public function down(){
        $sql = getFileSQL('users','down');
        $this->connect->prepare($sql)->execute();
    }
}
<?php 
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;
$capsule = new Capsule;
$capsule->addConnection( [
    'driver'=>'mysql',
    'host'=>'localhost',
    'port'=>3306,
    'database'=>'test',
    'username'=>'root',
    'password'=>'',
    'unix_socket'=>'',
    'charset'=>'utf8mb4',
    'collation'=>'utf8mb4_unicode_ci',
    'prefix'=>'',
    'strict'=>true,
    'engine'=>'InnoDB'
]);
$capsule->bootEloquent();
Capsule::schema()->create('users',function(Blueprint $table){
    $table->primary('user_id');
    $table->string('username');
    $table->string('password');
    $table->char('user_type',5);
    $table->string('email');
      
});
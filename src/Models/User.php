<?php
namespace Natan\SimpleBlog\Models;
use Illuminate\Database\Eloquent\Model;

class User extends Model {
    protected $table = 'users';
    protected $fillable = ['user_id','username','password','user_type','jwt_token','email'];
    public $timestamps = true;

}
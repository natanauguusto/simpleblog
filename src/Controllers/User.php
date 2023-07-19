<?php
namespace Natan\SimpleBlog\Controllers;

use Psr\Container\ContainerInterface as Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use \Natan\SimpleBlog\Models\User as UserModel;

class User {
    
    public function users(Request $request,Response $response,array $args):Response{
        $model = new UserModel();
        $users = $model->find()->fetch(true);
        return getJsonResponse($response,$users);
    }

    public function create(Request $request,Response $response,array $args):Response{
        $params = getJsonRequest($request);
        $user = new UserModel;
        $statusCode=200;

        $user->username = $params->username;
        $user->password = $params->password;
        $user->user_type= $params->user_type;
        $user->email= $params->email;
        $user->jwt_token= 'xyz';
        $user->user_id = date('dd/mm/yy');
        $id=$user->save();

        if($id){
            $data=["sucess"=>true,"message"=>"User is created"];
            $statusCode=201;
            return getJsonResponse($response,$data,$statusCode);
        }else{
            $data = ["sucess"=>false,"message"=>$user->fail()->getMessage(),"data"=>$user->data()];
            $statusCode=303;
            return getJsonResponse($response,$data,$statusCode);
        }
        
    }

    public function update(Request $request,Response $response,array $args):Response{
        return $response;
    }

    public function delete(Request $request,Response $response,array $args):Response{
        return $response;
    }
    public function error(Request $request,Response $response,array $args):Response{
        return $response;
    }
}
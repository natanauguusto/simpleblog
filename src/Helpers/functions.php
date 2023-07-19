<?php 
function get_env($envname){
    $env = parse_ini_file(__DIR__.'/../../.ini',true);
    return (array_key_exists($envname,$env))?$env[$envname]:NULL;
}
function getFileSQL($sql_file,$type='up'){
    $uri = __DIR__.'/../../config/';
    $sql = file_get_contents($uri.$sql_file.".".$type.".sql");
    return $sql;
}
function getJsonResponse($response, $data,$statusCode = 200){
    $payload = json_encode($data);
    $response->getBody()->write($payload);
    return $response
        ->withHeader("Content-Type","application/json")
        ->withStatus($statusCode);
}
function getJsonRequest($request){
    // $contentType = $request->getHeaderLine("Content-Type");
    $data = json_decode($request->getBody());
    return $data??(object)$request->getParsedBody();
}
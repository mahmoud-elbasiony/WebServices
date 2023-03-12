<?php
// require_once("config.php");
// require_once("MySQLHandler.php");
require_once("vendor/autoload.php");
// require_once("classes/MySQLHandler.php");
$url_piecies=explode("/",$_SERVER["PATH_INFO"]);
$resource = (isset($url_piecies[1]))? $url_piecies[1] : "" ;
$resource_id;
if(!isset($url_piecies[2])){
    $resource_id="";
} elseif(isset($url_piecies[2]) && is_numeric($url_piecies[2])){
    $resource_id=$url_piecies[2];
}else{
    $resource_id=0;
}
switch($_SERVER["REQUEST_METHOD"]){
    case "GET":
        if($resource !="items" || $resource_id==0){
            $err=["error"=> "Resource dosn't exist"];
            return return_response($err,404);
        }
        if($resource =="items"){
            get_items_data($resource_id);
        }
        break;
    case "POST":
        if($resource !="items"){
            $err=["error"=> "Resource dosn't exist"];
            return return_response($err,404);
        }
        if($resource =="items"){
            save_product();
        }
        break;
    case "DELETE":
        if($resource !="items" || $resource_id==0 || empty($resource_id)){
            $err=["error"=> "Resource dosn't exist"];
            return return_response($err,404);
        }
        if($resource =="items"){
            delete_items_by_id($resource_id);
        }
        break;

    default:
        $err=["error"=> "method not allowed!"];
        return return_response($err,404);
        break;
        
}



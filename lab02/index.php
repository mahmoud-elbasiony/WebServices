<?php
require("vendor/autoload.php");

$url_piecies=explode("/",$_SERVER["PATH_INFO"]);
$resource = (isset($url_piecies[1]))? $url_piecies[1] : "" ;
$resource_id;
if(!isset($url_piecies[2])){
    $resource_id="";
} elseif(isset($url_piecies[2]) && is_numeric($url_piecies[2])){
    $resource_id=intval($url_piecies[2]);
}else{
    $resource_id=0;
}

if($resource =="items"){
    require_once("routes/router.php");
}else{
    $err=["error"=> _NO_RESOURSES_];
    return return_response($err,404);
}




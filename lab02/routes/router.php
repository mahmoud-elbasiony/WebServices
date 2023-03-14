<?php

switch($_SERVER["REQUEST_METHOD"]){
    case "GET":
        if($resource_id==0){
            $err=["error"=> _NO_RESOURSES_];
            return return_response($err,404);
        }
        get_items_data($resource_id);
        break;

    case "POST":
        if($resource_id==0 || empty($resource_id)){
            $err=["error"=> _NO_RESOURSES_];
            return return_response($err,404);
        }
        save_product();
        break;

    case "DELETE":
        if($resource_id==0 || empty($resource_id)){
            $err=["error"=> _NO_RESOURSES_];
            return return_response($err,404);
        }
        delete_items_by_id($resource_id);
        break;

    case "PUT":
        if($resource_id==0 || empty($resource_id)){
            $err=["error"=> _NO_RESOURSES_];
            return return_response($err,404);
        }
        update_product($resource_id);
        break;

    default:
        $err=["error"=> _METHOD_NOT_ALLOWED_];
        return return_response($err,404);
        break;
}
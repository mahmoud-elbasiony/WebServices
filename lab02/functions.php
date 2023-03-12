<?php

function return_response($data,$status_code){
    header("Content-Type: application/json");
    http_response_code($status_code);
    echo json_encode($data);
}


function get_items_data($id=""){
    $db_handler=new MySQLHandler("products");
    try{
        $db_handler->connect();
        $result;
        if(!empty($id)){
            $result=$db_handler->get_record_by_id($id);
        }else{
            $result=$db_handler->get_data();
        }
        return return_response($result,200);
        
    }catch(err){
        $err=["error"=>err];
        return return_response($err,500);
    } 
}
function delete_items_by_id($id=""){
    $db_handler=new MySQLHandler("products");
    try{
        $db_handler->connect();
        $result=$db_handler->delete($id);
        return return_response($result,200);
    }catch(err){
        $err=["error"=>err];
        return return_response($err,500);
    } 
}

function save_product(){
    $fields=["name","price","units_in_stock"];
    $data = json_decode(file_get_contents('php://input'), true);

    foreach($fields as $field){
        if(!isset($data[$field]) || empty($data[$field])){
            $err=["error"=> "data insuffient"];
            return return_response($err,404);
        }
    }

    $db_handler=new MySQLHandler("products");
    $db_handler->save($data);
    return return_response($data,200);

}

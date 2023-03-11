<?php
require_once("config.php");
require_once("functions.php");
$City_weather="";
$cities="";
if(!empty($_POST)){
    $cities =read_from_file();
    // var_dump($cityId);
    $city_id=isset($_POST["city"])?intval($_POST["city"]):"";
    $City_weather= get_weather_by_city_id($city_id);
    // $chossenCity=array_filter($cities,"get_city_by_id");
    
}else{
    $cities =read_from_file();   
}
// var_dump($cities);
require_once("form.php");

// var_dump(read_from_file());
// echo $cities=read_from_file();
// $city='{ "id": 707860, "name": "Hurzuf", "country": "UA", "coord": { "lon": 34.283333, "lat": 44.549999 } }';
// var_dump( json_decode(read_from_file(),true));
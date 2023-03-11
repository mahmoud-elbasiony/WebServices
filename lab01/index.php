<?php
require("vendor/autoload.php");
// require_once("config.php");
require_once("functions.php");
$City_weather="";
$cities="";
if(!empty($_POST)){
    $cities =read_from_file();

    $city_id=isset($_POST["city"])?intval($_POST["city"]):"";
    //get weather by city id using curl
    $City_weather= get_weather_by_city_id_using_curl($city_id);

    //get weather by city id using guzzle
    // $City_weather= get_weather_by_city_id_using_guzzle($city_id);
    
}else{
    $cities =read_from_file();   
}

require_once("form.php");

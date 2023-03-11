<?php

function read_from_file( ) {
    $cities=json_decode(file_get_contents(_CITIES_FILE_),true,5);
    $cities=array_filter($cities,function($city){
        if($city["country"]=="EG"){
            return $city;
        }
    });
    return $cities;
}

function get_city_by_id($city){
    $cityId=isset($_POST["city"])?$_POST["city"]:"";
    // var_dump($city);
    if($city["id"]==$cityId){
        return $city;
    }
}

function get_weather_by_city_id($city){
    $api_url=_WEATHER_URL_."?id=".$city."&appid="._API_KEY_;
    $ch=curl_init($api_url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
    $response=curl_exec($ch);
    $data=json_decode($response,true);
    return $data;
}

function print_city_weather($cw){
        echo "<h2>".$cw["name"]." Weather status</h2>";
        $seconds = intval($cw["dt"]);
        echo "<h3>".date("d-m-Y", $seconds)."</h3>";
        echo "<h3> ".$cw["weather"][0]["description"]."</h3>";
        echo "<h3>min temp: ".$cw["main"]["temp_min"]."c</h3>";
        echo "<h3>max temp: ".$cw["main"]["temp_max"]."c</h3>";
        echo "<img src='https://openweathermap.org/img/wn/".$cw["weather"][0]["icon"].".png' alt='icon'>";
        echo "<h3>Humidity: ".$cw["main"]["humidity"]."%</h3>";
        echo "<h3>Wind: ".$cw["wind"]["speed"]." km/h</h3>";
}
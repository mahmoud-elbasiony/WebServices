<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Forcast</title>
    <style>
        body{
            padding:15px 30px;
        }
    </style>
</head>
<body>
    <?php
    if(!empty($City_weather)){
        // var_dump($City_weather);
        print_city_weather($City_weather);
    }
    ?>
    <h3>Weather Forcast</h3>
    <form method="POST" action="index.php">
    <label for="cities">Choose a city:</label>
    <select name="city" id="cities">
    <?php 
        foreach($cities as $city){
            // var_dump( $city);
            echo "<option value=".$city["id"].">EG>>".$city["name"]."</option>";
        }
        ?>
    </select>
    <input type="submit" value="Submit">
    </form>
    
</body>
</html>
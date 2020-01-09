<?php

if (isset($_POST['sub']))
{

    $city = $_POST['city'];

    // $country = $_POST['cc'];

    $url="http://api.openweathermap.org/data/2.5/weather?q=".$city."&units=metric&cnt=7&lang=en&appid=9d170c1ab1e342e5efb1f239653057de";


    $json=file_get_contents($url);

    $data=json_decode($json,true);

    echo "<h2>Current Temperature in " . $city . " is :<button class='btn btn-success'>" . $data['main']['temp'] . "&#176; Celcius</button></h2>";

    echo "<h2>Wind Speed is :<u>" . $data['wind']['speed'] . "</u> KMPH</h2>";

    echo "<h2>Humidity is :<u>" . $data['main']['humidity'] . "</u> %</h2>";

    

    echo  "<h2>Weather condition:<u>" . $data['weather'][0]['main']  . "</u>";

    

    echo "<img src='http://openweathermap.org/img/w/" .$data['weather'][0]['icon']. ".png' width='90' height='90'></h2>";
}
else
{

    echo "Oops something went wrong !! ;(";
}

?>
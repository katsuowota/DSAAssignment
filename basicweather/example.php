<?php
include 'YahooWeather.class.php';

// create an instance of the class with L.A.'s WOEID
$weather = new YahooWeather(1103816, 'c');
$temperature = $weather->getTemperature();
$city = $weather->getLocationCity();
$country = $weather->getLocationCountry();
$forecast = $weather->getForecastTomorrowHigh();
echo "It is now $temperature in $city, $country. ";
echo "Tomorrow's temperature will reach a maximum of $forecast. ";
?>
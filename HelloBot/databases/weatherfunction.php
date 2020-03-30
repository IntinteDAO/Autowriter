<?php

function weather($city) {
	include("config.php");
	$getweather = file('http://api.openweathermap.org/data/2.5/weather?q='.$city.'&APPID='.$weather_api);
	$weather = json_decode($getweather[0], TRUE);
	return round(($weather["main"]["temp"])-273.15, 1).'°C';
}
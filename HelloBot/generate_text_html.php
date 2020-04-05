<?php

$lang = 'en';

include('databases/fortunes.php');
include('databases/hello.php');
include('databases/weatherfunction.php');
include('databases/airquality.php');
include('databases/date.php');
include("lang/$lang/lang.php");
include("config.php");

// Hello
echo hello('zapread', $lang);
echo PHP_EOL.PHP_EOL;

// Fortunes
echo '<h2>'.$str['fortunes'].'</h2>'.PHP_EOL;
echo fortunes($lang);
echo PHP_EOL.PHP_EOL;

// Special dates
echo '<h2>'.$str['special_dates'].'</h2>'.PHP_EOL;
if(date_newyear() == 0) { $new_year = '<b>'.$str['happynewyear'].'</b>'; } else { $new_year = date_newyear().' days remaining'; }
if(date_holidays() == 0) { $holiday = '<b>'.$str['happyholidays'].'</b>'; } else { $holiday = date_holidays().' days remaining'; }
if(date_santaclaus() == 0) { $santaclaus = '<b>'.$str['happysantaclaus'].'</b>'; } else { $santaclaus = date_santaclaus().' days remaining'; }

echo '<table class="table table-hover table-striped table-sm">';
echo '<tr><td>'.$str['date2newyear'].'</td><td>'.$new_year.'</td></tr>';
echo '<tr><td>'.$str['date2holidays'].'</td><td>'.$holiday.'</td></tr>';
echo '<tr><td>'.$str['date2santaclaus'].'</td><td>'.$santaclaus.'</td></tr>';
echo '<tr><td>'.$str['date2craigwright'].'</td><td>'.date_craigwright().'</td></tr>';
echo '</table>';
echo PHP_EOL.PHP_EOL;
// Weather
echo '<h2>'.$str['weather'].'</h2>'.PHP_EOL;
$weather_city = file('city.txt');

echo '<table class="table table-hover table-striped table-sm">';
for($i=0; $i<=count($weather_city)-1; $i++) {

// Air Quality
$city = explode(',', $weather_city[$i])[0];
$airquality = airquality($city);
if(empty($airquality)) { $airquality = 0; }
$result_airquality = airquality_level($airquality);
$result = $str['airquality'][$result_airquality['status']].' ('.$result_airquality['level'].')';

	if($i%2==0) {
		echo '<tr><td>'.trim($weather_city[$i]).'</td><td>'.weather(trim($weather_city[$i])).'</td><td>'.$result.'</td>';
	} else {
		echo '<td>'.trim($weather_city[$i]).'</td><td>'.weather(trim($weather_city[$i])).'</td><td>'.$result.'</td></tr>';
	}
}
echo '</table>';
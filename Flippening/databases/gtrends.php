<?php

function gtrends($crypto) {

$gtrends = file("https://bitinfocharts.com/comparison/google_trends-$crypto.html")[0];
$explode_gtrends = explode("[", $gtrends);

$startpos = 0;
$endpos = 0;

for($i=0; $i<=count($explode_gtrends)-1; $i++) {

	if(empty($startpos) && (strpos($explode_gtrends[$i], 'new Date("') !== false)) {
		$startpos = $i;
	}

	if(empty($endpos) && (strpos($explode_gtrends[$i], '{labels: ') !== false)) {
		$explode_gtrends[$i] = str_replace("], {labels:", ",", $explode_gtrends[$i]);
		$endpos = $i;
	}

	if(!empty($startpos) && !empty($endpos)) {
		$gtrends2 = array_slice($explode_gtrends, $startpos, -1 * ((count($explode_gtrends)-1) - $endpos));
	}

}

for($i=0; $i<=count($gtrends2)-1; $i++) {
	$explode2[$i][0] = explode('"', str_replace('new Date("', '', $gtrends2[$i]));
	$explode_temp = $explode2[$i][0][1];
	$temp_date = explode('/', $explode2[$i][0][0]);
	$explode2[$i][0] = strtotime($temp_date[2].'.'.$temp_date[1].'.'.$temp_date[0]);
	$explode2[$i][1] = str_replace('],', '', str_replace('),', '', $explode_temp));
}

return $explode2;
}
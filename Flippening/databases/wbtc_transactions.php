<?php

// WTF is that?!

function wbtc_transactions() {
$data = file("https://etherscan.io/token/token-analytics?m=normal&contractAddress=0x2260fac5e5542a773aa44fbcfedf7c193bc2c599");

for($i=0; $i<=(count($data)-1); $i++) {

    if (strpos($data[$i], 'var plotData = eval') !== false) {
	$explode1 = explode("[", trim(str_replace(']);', "", str_replace("],", "", str_replace("var plotData = eval([[", "", $data[$i])))));

	    for($i=0; $i<=(count($explode1)-1); $i++) {
	    $date[$i] = explode(')' , $explode1[$i])[0];
	    $explode2[$i] = explode(',', str_replace($date[$i], '', $explode1[$i]));
	    $explode2[$i][0] = str_replace('Date.UTC(', '', $date[$i]);
	    $temp_date = explode(',', $explode2[$i][0]);
	    $explode2[$i][0] = strtotime($temp_date[2].'.'.$temp_date[1].'.'.$temp_date[0]);
	    }

	    return $explode2;
	}
    }
}
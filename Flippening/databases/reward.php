<?php

function reward($crypto) {
$json = json_decode(file("https://howmanyconfs.com/api/data")[0], TRUE);

for($i=0; $i<=count($json)-1; $i++) {
	if($json[$i]['name']=='Bitcoin') { $price = $json[$i]['price']; }

	if(strtolower($json[$i]['name'])==strtolower($crypto)) {

		if($json[$i]['priceCurrency']=='BTC') { $price = $price*$json[$i]['price']; }
		return number_format(floor(86400/$json[$i]['blockTimeInSeconds'])*$json[$i]['blockReward']*$price, 2, '.', ' ');
	}

}

}
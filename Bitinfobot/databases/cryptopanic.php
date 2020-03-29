<?php

function cryptopanic($fullname, $currency) {

	include("config.php");
	$data = json_decode(implode("", file("https://cryptopanic.com/api/posts/?auth_token=$cryptopanic_api&filter=important&currencies=$currency")), TRUE);
	$positive_rate = 0;
	$negative_rate = 0;
	$all = 0;
	
	for($i=0; $i<=(count($data["results"])-1); $i++) {

		if($data["results"][$i]["votes"]["positive"] >= $data["results"][$i]["votes"]["negative"]) {
			$positive_rate++; $all++;
		} else {
			$negative_rate++; $all++;
		}
	}

return array('positive'=>$positive_rate, 'negative'=>$negative_rate, 'all'=>$all);
}
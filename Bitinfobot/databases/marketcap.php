<?php

function dominance() {
	$market = file("https://api.coinpaprika.com/v1/global");
	$json = json_decode($market[0], TRUE);
	return $json["bitcoin_dominance_percentage"];
}

function marketcap() {
	$market = file("https://api.coinpaprika.com/v1/global");
	$json = json_decode($market[0], TRUE);
	return number_format($json["market_cap_usd"], 0, "", " ");
}

function volume() {
	$market = file("https://api.coinpaprika.com/v1/global");
	$json = json_decode($market[0], TRUE);
	return number_format($json["volume_24h_usd"], 0, "", " ");
}
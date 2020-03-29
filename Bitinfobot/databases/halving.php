<?php

function halving($crypto) {

if($crypto=="BTC") {
	$data = file("https://www.bitcoinblockhalf.com/");
	$name = "Bitcoin";
} else {
	$data = file("https://www.litecoinblockhalf.com/");
	$name = "Litecoin";
}


for($i=0; $i<=(count($data)-1); $i++) {

	if (strpos($data[$i], 'Reward-Drop ETA date') !== false) {
	$return['halving_time'] = str_replace('Reward-Drop ETA date: ', '', strip_tags(trim($data[$i])));
	}

	if (strpos($data[$i], 'As of now, the block reward is') !== false) {
	$return['current_blockreward'] = str_replace(' coins per block and will decrease to', '', str_replace('reward halves and will keep on halving until the block reward per block becomes 0 (approximately by year 2142). As of now, the block reward is ', '', str_replace('2140', '2142', strip_tags(trim($data[$i])))));
	}

	if (strpos($data[$i], 'coins per block post halving. ') !== false) {
	$return['future_blockreward'] = str_replace(' coins per block post halving.', '', strip_tags(trim($data[$i])));
	}

	if (strpos($data[$i], 'Blocks until mining reward is halved:') !== false) {
	$return['blocks_left'] = str_replace('Blocks until mining reward is halved:', '', trim(strip_tags($data[$i])));
	}
}

return $return;
}
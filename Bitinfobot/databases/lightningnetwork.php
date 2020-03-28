<?php

function lnstats() {

	$json = json_decode(implode(" ", file('https://1ml.com/statistics?json=true')), TRUE);

	return array(
	'nodes' => $json['numberofnodeswithactivechannels'],
	'nodes30dchange' => round($json['numberofnodeswithactivechannels30dchange'], 2),
	'channels' => $json['numberofchannels'],
	'channels30dchange' => round($json['numberofchannels30dchange'], 2),
	'newchannels24h' => $json['newchannels24h'],
	'networkcapacity' => round($json["networkcapacity"]/100000000, 3),
	'networkcapacity30dchange' => round($json["networkcapacity30dchange"], 3)
	);

}
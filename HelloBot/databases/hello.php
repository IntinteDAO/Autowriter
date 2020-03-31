<?php

function hello($network, $lang) {

	if($network=="zapread") {
		$database = file("lang/$lang/hello_zapread.txt");
	}

	$count = count($database)-1;
	$rand = rand(0, $count);
	return trim($database[$rand]);

}
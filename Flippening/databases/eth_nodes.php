<?php

function eth_nodes() {

	$nodesdb = explode('</span>', file('https://ethernodes.org')[0]);

	for($i=0; $i<=count($nodesdb)-1; $i++) {
		if (strpos($nodesdb[$i], '(100%)') !== false) {
			return trim(str_replace(' (100%)', '', strip_tags($nodesdb[$i])));
		}
	}
}
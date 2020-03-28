<?php

function fear_level() {

	$fear_web = file('https://alternative.me/crypto/fear-and-greed-index/');

	for($i=0; $i<=(count($fear_web)-1); $i++) {
		if (strpos($fear_web[$i], '<div class="fng-circle"') !== false) {
			return strip_tags(trim($fear_web[$i]));
		}
	}

}


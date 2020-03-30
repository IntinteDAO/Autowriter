<?php

function fortunes($lang) {

	if($lang=="en") {
		$dir = '/usr/share/games/fortunes';
	} else {
		$dir = '/usr/share/games/fortunes/'.$lang;
	}

	return shell_exec('fortune '.$dir);

}
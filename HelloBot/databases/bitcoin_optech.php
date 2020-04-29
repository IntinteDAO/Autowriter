<?php

function optech_today() {
	$current_year = '20' . date("y");
	$current_month = date("m");
	$current_day = date("d");
	$handle = curl_init("https://bitcoinops.org/en/newsletters/$current_year/$current_month/$current_day");
	curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
	$response = curl_exec($handle);
	$httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
	curl_close($handle);
	if ($httpCode == 404) {
		return 'false';
	} else {
		return 'true';
	}
}

function optech_yesterday() {
	$current_year = '20' . date("y");
	$current_month = date("m");
	$current_day = date("d", strtotime('-1 day'));
	$handle = curl_init("https://bitcoinops.org/en/newsletters/$current_year/$current_month/$current_day");
	curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
	$response = curl_exec($handle);
	$httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
	curl_close($handle);
	if ($httpCode == 404) {
		return 'false';
	} else {
		return 'true';
	}
}

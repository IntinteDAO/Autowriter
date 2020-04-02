<?php

function date_newyear() {

	$current_month = date("m");
	$current_day = date("d");

	if($current_month == 1 && $current_day == 1) {
		return 0;
	} else {
		$currentdate = new DateTime(date('Y-m-d'));
		$future_newyear = new DateTime(date('Y-01-01', strtotime('+1 year')));
		return $future_newyear->diff($currentdate)->format("%a");
	}
}

function date_holidays() {

	$current_month = date("m");

	if($current_month == 7 || $current_month == 8) {
		return 0;
	} else if($current_month > 8) {
		$currentdate = new DateTime(date('Y-m-d'));
		$future_holidays = new DateTime(date('Y-07-01', strtotime('+1 year')));
		return $future_holidays->diff($currentdate)->format("%a");
	} else {
		$currentdate = new DateTime(date('Y-m-d'));
		$future_holidays = new DateTime(date('Y-07-01'));
		return $future_holidays->diff($currentdate)->format("%a");
	}
}

function date_santaclaus() {

	$current_month = date("m");
	$current_day = date("d");

	if($current_month == 12 && $current_day == 6) {
		return 0;
	} else if ($current_month == 12 && $current_day > 6) {
		$currentdate = new DateTime(date('Y-m-d'));
		$future_santaclaus = new DateTime(date('Y-12-06', strtotime('+1 year')));
		return $future_santaclaus->diff($currentdate)->format("%a");
	} else {
		$currentdate = new DateTime(date('Y-m-d'));
		$future_santaclaus = new DateTime(date('Y-12-06'));
		return $future_santaclaus->diff($currentdate)->format("%a");
	}
}

function date_craigwright() {
	return 'NaN';
}
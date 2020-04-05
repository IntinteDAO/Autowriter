<?php

function airquality($city) {
    include("config.php");
    return json_decode(file('https://api.waqi.info/feed/'.$city.'/?token='.$airquality_api)[0], TRUE)['data']['aqi'];
}

function airquality_level($level) {

	if($level<=50) {
		return array('level'=>$level, 'status'=>0);
	} else if($level<=100) {
		return array('level'=>$level, 'status'=>1);
	} else if($level<=150) {
		return array('level'=>$level, 'status'=>2);
	} else if($level<=200) {
		return array('level'=>$level, 'status'=>3);
	} else if($level<=300) {
		return array('level'=>$level, 'status'=>4);
	} else {
		return array('level'=>$level, 'status'=>5);
	}

}
<?php

function volume($crypto) {
return number_format(json_decode(file('https://api.coincap.io/v2/assets/'.$crypto)[0], TRUE)["data"]["volumeUsd24Hr"], 2, '.', '');
}
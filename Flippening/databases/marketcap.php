<?php

function marketcap($crypto) {
return number_format(json_decode(file('https://api.coincap.io/v2/assets/'.$crypto)[0], TRUE)["data"]["marketCapUsd"], 2, '.', '');
}

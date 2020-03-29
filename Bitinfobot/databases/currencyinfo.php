<?php

function currencyinfo($name) {
$data = json_decode(file('https://api.coincap.io/v2/assets/'.trim($name))[0], TRUE)['data'];

return array($data['name']=>array(
'price' => round($data["priceUsd"], 4),
'change24h' => round($data["changePercent24Hr"], 3),
'marketcap' => round($data["marketCapUsd"], 2),
'volume' => round($data["volumeUsd24Hr"], 2)
));

}
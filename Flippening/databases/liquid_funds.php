<?php

function liquid_funds() {
return json_decode(json_decode(file("https://liquid.net/liquid_data")[0], TRUE)["lbtc_by_month"], TRUE);
}
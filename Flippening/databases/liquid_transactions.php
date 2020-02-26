<?php

function liquid_transactions() {
return json_decode(file("https://liquid.net/liquid_data")[0], TRUE)["transactions"]["value"];
}
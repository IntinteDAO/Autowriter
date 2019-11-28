<?php

function btc_nodes() {
$snapshots = json_decode(file("https://bitnodes.earn.com/api/v1/snapshots/")[0], TRUE)["results"][0]["url"];
return json_decode(file($snapshots)[0], TRUE)["total_nodes"];
}
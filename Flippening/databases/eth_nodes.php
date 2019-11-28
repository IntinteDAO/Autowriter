<?php

function eth_nodes() {
$database = json_decode(file('https://etherscan.io/stats_nodehandler.ashx?t=1&code=&range=1&additional=')[0], TRUE);
$count = count($database)-1;
$nodes = 0;
for($i=0; $i<=$count; $i++) {
$nodes = $nodes + $database[$i]["z"];
}

return $nodes;
}
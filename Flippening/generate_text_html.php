<?php
error_reporting(0);
$lang = 'en';
include("lang/$lang.php");

// Hello
#echo $str['hello'].PHP_EOL.PHP_EOL;
#echo $str['description'].PHP_EOL.PHP_EOL;

// Initialize data
include('databases/btc_nodes.php');
include('databases/eth_nodes.php');
include('databases/marketcap.php');
include('databases/reward.php');
include('databases/volume.php');
include('databases/gtrends.php');
include('functions/difference.php');

// Create table
echo '<table class="table table-hover table-striped table-sm">'.PHP_EOL;
echo '<tr><td><b>Metrics</b></td><td><b>Ethereum</b></td><td><b>Bitcoin</b></td><td><b>Flippening</b></td></tr>'.PHP_EOL;
echo '<tr><td>'.$str['marketcap'].'</td><td>$'.marketcap('ethereum').'</td><td>$'.marketcap('bitcoin').'</td><td>'.diff(marketcap('ethereum'), marketcap('bitcoin')).'%</td></tr>'.PHP_EOL;
echo '<tr><td>'.$str['tradingvolume'].'</td><td>$'.volume('ethereum').'</td><td>$'.volume('bitcoin').'</td><td>'.diff(volume('ethereum'), volume('bitcoin')).'%</td></tr>'.PHP_EOL;
echo '<tr><td>'.$str['miningreward'].'</td><td>$'.reward('ethereum').'</td><td>$'.reward('bitcoin').'</td><td>'.diff(reward('ethereum'), reward('bitcoin')).'%</td></tr>'.PHP_EOL;
echo '<tr><td>'.$str['nodes'].'</td><td>'.eth_nodes().'</td><td>'.btc_nodes().'</td><td>'.diff(eth_nodes(),btc_nodes()).'%</td></tr>'.PHP_EOL;
$gtrends_eth = gtrends('eth');
$gtrends_btc = gtrends('btc');
echo '<tr><td>'.$str['gtrends'].'</td><td>'.$gtrends_eth[count($gtrends_eth)-1][1].'</td><td>'.$gtrends_btc[count($gtrends_btc)-1][1].'</td><td>'.diff($gtrends_eth[count($gtrends_eth)-1][1],$gtrends_btc[count($gtrends_btc)-1][1]).'%</td></tr>'.PHP_EOL;
echo '</table>';
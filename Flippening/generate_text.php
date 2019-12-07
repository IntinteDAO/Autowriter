<?php
$lang = 'en';
include("lang/$lang.php");

// Hello
echo $str['hello'].PHP_EOL.PHP_EOL;
echo $str['description'].PHP_EOL.PHP_EOL;

// Initialize data
include('databases/btc_nodes.php');
include('databases/eth_nodes.php');
include('databases/marketcap.php');
include('databases/reward.php');
include('databases/volume.php');
include('functions/difference.php');

// Create table
echo '| Metrics   | Ethereum | Bitcoin | Flippening |'.PHP_EOL;
echo '|-----------|----------|---------|------------|'.PHP_EOL;
echo '|'.$str['marketcap'].'|$'.marketcap('ethereum').'|$'.marketcap('bitcoin').'|'.diff(marketcap('ethereum'), marketcap('bitcoin')).'%|'.PHP_EOL;
echo '|'.$str['tradingvolume'].'|$'.volume('ethereum').'|$'.volume('bitcoin').'|'.diff(volume('ethereum'), volume('bitcoin')).'%|'.PHP_EOL;
echo '|'.$str['miningreward'].'|$'.reward('ethereum').'|$'.reward('bitcoin').'|'.diff(reward('ethereum'), reward('bitcoin')).'%|'.PHP_EOL;
echo '|'.$str['nodes'].'|'.eth_nodes().'|'.btc_nodes().'|'.diff(eth_nodes(),btc_nodes()).'%|'.PHP_EOL;
<?php

$lang = 'en';

include('databases/marketcap.php');
include('databases/fear.php');
include('databases/halving.php');
include('databases/lightningnetwork.php');
include("lang/$lang/lang.php");

// Simple Bitcoin data
echo '<h2>'.$str['bitcoin_data'].'</h2>'.PHP_EOL;
echo '<table class="table table-hover table-striped table-sm">';
echo '<tr><td>'.$str['marketcap'].'</td><td>$'.marketcap().'</td></tr>';
echo '<tr><td>'.$str['volume'].'</td><td>$'.volume().'</td></tr>';
echo '<tr><td>'.$str['dominance'].'</td><td>'.dominance().'%</td></tr>';
echo '<tr><td>'.$str['fear_level'].'</td><td>'.fear_level().'</td></tr>';
echo '</table>';
echo PHP_EOL.PHP_EOL;

// Halving
echo '<h2>'.$str['halving'].'</h2>'.PHP_EOL;
$halving_data = halving('BTC');
echo '<table class="table table-hover table-striped table-sm">';
echo '<tr><td><b>'.$str['name'].'</b></td><td><b>'.$str['halving_time'].'</b></td><td><b>'.$str['current_blockreward'].'</b></td><td><b>'.$str['future_blockreward'].'</b></td><td><b>'.$str['blocks_left'].'</b></td></tr>';
echo '<tr><td>'.$halving_data['name'].'</td><td>'.$halving_data['halving_time'].'</td><td>'.$halving_data['current_blockreward'].'</td><td>'.$halving_data['future_blockreward'].'</td><td>'.$halving_data['blocks_left'].'</td></tr>';
$halving_data = halving('LTC');
echo '<tr><td>'.$halving_data['name'].'</td><td>'.$halving_data['halving_time'].'</td><td>'.$halving_data['current_blockreward'].'</td><td>'.$halving_data['future_blockreward'].'</td><td>'.$halving_data['blocks_left'].'</td></tr>';
echo '</table>';
echo PHP_EOL.PHP_EOL;

// Lightning Network Statistics

$lnstats = lnstats();

echo '<h2>'.$str['lnstats'].'</h2>'.PHP_EOL;
echo '<table class="table table-hover table-striped table-sm">';
echo '<tr><td><b>'.$str['data'].'</b></td><td><b>'.$str['value'].'</b></td><td><b>'.$str['change30d'].'</b></td></tr>';
echo '<tr><td><b>'.$str['nodes'].'</b></td><td><b>'.$lnstats['nodes'].'</b></td><td><b>'.$lnstats['nodes30dchange'].'%</b></td></tr>';
echo '<tr><td><b>'.$str['channels'].'</b></td><td><b>'.$lnstats['channels'].'</b></td><td><b>'.$lnstats['channels30dchange'].'%</b></td></tr>';
echo '<tr><td><b>'.$str['network_capacity'].'</b></td><td><b>'.$lnstats['networkcapacity'].'</b></td><td><b>'.$lnstats['networkcapacity30dchange'].'%</b></td></tr>';
echo '</table>';
echo PHP_EOL;
echo '<small>'.$str['new_channels_24h'].$lnstats['newchannels24h'].'</small>';
echo PHP_EOL.PHP_EOL;
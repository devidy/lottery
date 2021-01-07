<?php

use App\Lottery\Entity\Lottery;

require_once __DIR__ . '/../vendor/autoload.php';

$lottery = new Lottery(3, 6);

var_dump($lottery->getTotalGames()); 
var_dump($lottery->getQuantityTens()); 
var_dump($lottery->generateBet());
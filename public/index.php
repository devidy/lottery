<?php

use App\Lottery\Entity\Lottery;

require_once __DIR__ . '/../vendor/autoload.php';

$lottery = new Lottery(3, 6);

$lottery->generateGames();

var_dump($lottery->getGames());
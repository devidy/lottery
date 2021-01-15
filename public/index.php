<?php
use App\Lottery\Entity\Lottery;

require_once __DIR__ . '/../vendor/autoload.php';

try {
    $lottery = new Lottery(1, 3);

    $lottery->generateGames();
    $lottery->lotteryRaffle();

    echo $lottery->showResult();
} catch (Exception $e) {
    echo $e->getMessage(), "\n";
}

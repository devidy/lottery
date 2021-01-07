<?php

namespace App\Lottery\Entity;

class Lottery
{
    /**
     * @var int
     */
    private $quantityTens;

    /**
     * @var array
     */
    private $result;

    /**
     * @var int
     */
    private $totalGames;

    /**     *
     * @var array
     */
    private $games;

    /**
     * Create a new lottery instance.
     * 
     * @param int $totalGames
     * @param int $quantityTens
     * 
     * @return void
     */
    public function __construct($totalGames, $quantityTens)
    {
        if ($quantityTens < 6 || $quantityTens >10) {
            throw new \Exception('A quantidade de dezenas deve ser entre 6 e 10');
        }
        
        $this->totalGames = $totalGames;
        $this->quantityTens = $quantityTens;
    }
}
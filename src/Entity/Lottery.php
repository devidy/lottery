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
        
        $this->setTotalGames($totalGames);
        $this->setQuantityTens($quantityTens);
    }

    /**
     * 
     * @param int $quantityTens
     * @return void
     */
    public function setQuantityTens($quantityTens)
    {
        $this->quantityTens = $quantityTens;
    }

    /**
     * 
     * @return int
     */
    public function getQuantityTens()
    {
        return $this->quantityTens;
    }

    /**
     * 
     * @param int $totalGames
     * @return void
     */
    public function setTotalGames($totalGames)
    {
        $this->totalGames = $totalGames;
    }

    /**
     * 
     * @return int
     */
    public function getTotalGames()
    {
        return $this->totalGames;
    }

    /**
     * 
     * @param array $result
     * @return void
     */
    public function setResult($result)
    {
        $this->result = $result;
    }

    /**
     * 
     * @return array
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * 
     * @param array $games
     * @return void
     */
    public function setGames($games)
    {
        $this->games = $games;
    }

    /**
     * 
     * @return array
     */
    public function getGames()
    {
        return $this->games;
    }

}
<?php

namespace App\Lottery\Entity;

use App\Lottery\Traits\RaffleTrait;

class Lottery
{
    use RaffleTrait;

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

    /**
     * Cria o array de apostas
     * 
     * @return array
     */
    public function generateGames()
    {
        $bet = [];

        for ($i=0; $i < $this->totalGames; $i++) { 
            $bet[] = $this->generateBet();
        }

        $this->setGames($bet);
    }


    /**
     * Cria a aposta
     *
     * @return array
     */
    private function generateBet()
    {
        return $this->generatesRandomNumbers($this->quantityTens);
    }

    /**
     * obtem o resultado do sorteio
     * 
     * @return void
     */
    public function lotteryRaffle()
    {
        $this->setResult($this->generatesRandomNumbers(6));
    }

    /**
     * Monta html com a tabela para exibir os resultados
     *
     * @return string
     */
    public function showResult()
    {
        return "<table border='1'>
                    <thead>
                        <tr>
                            <th style='text-align: center' colspan='4'>LOTERIA</th>
                        </tr>
                        <tr>
                            <td  style='text-align: center' colspan='4'>Dezenas Sorteadas:" .implode(", ", $this->getResult())."</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan='2'>Aposta</td>
                            <td style='text-align: center;'>Quantidade de acertos</td>
                            <td style='text-align: center;'>Acertos</td>
                        </tr>
                        ". $this->buildColumns() ."
                    </tbody>
                </table>";
    }

    /**
     * 
     *
     * @return string
     */
    public function buildColumns()
    {
        $htmlColumns = "";

        foreach ($this->games as $jogo) {
            $htmlColumns .= "<tr>
                        <td colspan='2'>".implode(", ", $jogo)."</td>
                        <td style='text-align: center;'>".count($this->getBettingResult($jogo))."</td>
                        <td style='text-align: center;'>".implode(", ", $this->getBettingResult($jogo))."</td>
                    </tr>";
        }

        return $htmlColumns;
    }

    /**
     * Confere o resultado das apostas
     * @param array $game
     * @return array
     */
    public function getBettingResult($game)
    {
        return array_intersect($this->getResult(), $game);
    }
}
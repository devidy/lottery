<?php

namespace App\Lottery\Traits;

trait RaffleTrait
{

    /**
     * Sorteia dezenas aleatórias entre 1 e 60
     *
     * @param int $quantityTens
     * @return array
     */
    public function generatesRandomNumbers($quantityTens)
    {
        $tens = [];
        $quantityTensCreated = 0;

        while ($quantityTensCreated < $quantityTens) {
            $numberDrawn = rand(1, 60);

            if (!in_array($numberDrawn, $tens)) {
                $tens[] = $numberDrawn;
                $quantityTensCreated++;
            }
        }

        sort($tens, SORT_NUMERIC);

        return $tens;
    }
}
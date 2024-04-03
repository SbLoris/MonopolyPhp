<?php

namespace App\Classes;

class Dices {

    public Dice $dice1;
    public Dice $dice2;
    public int $result;

    public function __construct()
    {
        $this->dice1 = new Dice();
        $this->dice2 = new Dice();
    }

    public function roll(): int
    {
        $this->result = 0;
        $this->result += $this->dice1->roll();
        $this->result += $this->dice2->roll();
        return $this->result;
    }

    public function is_double(): bool
    {
        return $this->dice1->getValue() == $this->dice2->getValue();
    }

}
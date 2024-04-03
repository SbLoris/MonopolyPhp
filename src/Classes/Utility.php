<?php

namespace App\Classes;

use App\Interfaces\InterfaceUtility;

class Utility implements InterfaceUtility
{
    private string $name;
    private int $price;
    private array $rent;

    public function __construct(string $name, int $price, array $rent)
    {
        $this->name = $name;
        $this->price = $price;
        $this->rent = $rent;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getRent(int $diceRoll): int
    {
        return $this->rent[$diceRoll];
    }
}

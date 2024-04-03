<?php

namespace App\Interfaces;

interface InterfaceUtility
{
    public function getName(): string;
    public function getPrice(): int;
    public function getRent(int $diceRoll): int;
}

<?php

namespace App\Interfaces;

interface InterfaceRailRoad
{
    public function getName(): string;
    public function getPrice(): int;
    public function getRent(int $numOwnedRailroads): int;
}

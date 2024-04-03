<?php

namespace App\Interfaces;

use App\Classes\Property;

interface InterfacePlayer {
    public function __construct(string $name, float $initialCash);
    public function move(int $steps): void;
    public function pay(float $amount): bool;
    public function goToJail(): void;
    public function buyProperty(Property $property): void;
    public function addCash(float $amount): void;
}

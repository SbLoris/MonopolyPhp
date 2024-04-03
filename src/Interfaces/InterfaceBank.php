<?php

namespace App\Interfaces;

interface InterfaceBank {
    public function cashout(int $amount): bool;
    public function cashin(int $amount): bool;
    // public function giveConstruction(string $type): bool;
    // public function takeConstruction(string $type): bool;
    public function giveHouse(): bool;
    public function takeHouse(): bool;
    public function giveHotel(): bool;
    public function takeHotel(): bool;
}
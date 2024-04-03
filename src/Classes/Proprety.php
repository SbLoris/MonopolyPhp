<?php

namespace App\Classes;

class Property {
    public string $name;
    public string $color;
    public ?Player $currentOwner = null;
    public float $purchasePrice;
    public float $housePrice;
    public float $hotelPrice;
    public array $rentPrices; // Tableau associatif ou indexé des loyers en fonction du nombre de maisons/hôtels
    public bool $isRailroad;
    public int $houses = 0;
    public bool $hasHotel = false;

    public function __construct(string $name, string $color, float $purchasePrice, float $housePrice, float $hotelPrice, array $rentPrices, bool $isRailroad) {
        $this->name = $name;
        $this->color = $color;
        $this->purchasePrice = $purchasePrice;
        $this->housePrice = $housePrice;
        $this->hotelPrice = $hotelPrice;
        $this->rentPrices = $rentPrices;
        $this->isRailroad = $isRailroad;
    }

    public function buyProperty(Player $player): bool {
        if ($this->currentOwner === null && $player->pay($this->purchasePrice)) {
            $this->currentOwner = $player;
            $player->addProperty($this);
            return true;
        }
        return false;
    }

    public function addHouse(Player $player): bool {
        if ($this->currentOwner === $player && !$this->hasHotel && $this->houses < 4 && $player->pay($this->housePrice)) {
            $this->houses++;
            return true;
        }
        return false;
    }

    public function convertToHotel(Player $player): bool {
        if ($this->currentOwner === $player && !$this->hasHotel && $this->houses === 4 && $player->pay($this->hotelPrice)) {
            $this->houses = 0;
            $this->hasHotel = true;
            return true;
        }
        return false;
    }

    public function calculateRent(): float {
        if ($this->hasHotel) {
            return $this->rentPrices['hotel'];
        } else {
            return $this->rentPrices[$this->houses] ?? 0.0;
        }
    }
}

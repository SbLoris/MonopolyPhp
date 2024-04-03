<?php

namespace App\Classes;

class Player {
    public string $name;
    public float $cash;
    public array $properties; // Les propriétés détenues par le joueur
    public int $position; // La position du joueur sur le plateau
    public bool $inJail; // Si le joueur est en prison

    public function __construct(string $name, float $initialCash) {
        $this->name = $name;
        $this->cash = $initialCash;
        $this->properties = [];
        $this->position = 0; // Commence au départ
        $this->inJail = false;
    }

    public function move(int $steps): void {
        $this->position += $steps;

    }

    public function pay(float $amount): bool {
        if ($this->cash >= $amount) {
            $this->cash -= $amount;
            return true;
        } else {
            // Le joueur n'a pas assez d'argent
            return false;
        }
    }

    public function goToJail(): void {
        $this->inJail = true;
    }

    public function buyProperty(Property $property): void {
        if ($this->cash >= $property->purchasePrice && $property->currentOwner === null) {
            $this->cash -= $property->purchasePrice;
            $this->properties[] = $property;
            $property->currentOwner = $this; // Assigne ce joueur comme le nouveau propriétaire de la propriété
        }
    }

    public function addCash(float $amount): void {
        $this->cash += $amount;
    }

}

<?php

namespace App\Classes;

class Game implements InterfaceGame {
    public array $players;
    public array $board; // Contiendra les propriétés, les chances, et les communautés
    public Dices $dices;
    public int $currentPlayerIndex = 0;

    public function __construct(array $players, array $board) {
        $this->players = $players;
        $this->board = $board;
        $this->dices = new Dices();
    }

    public function playTurn() {
        $currentPlayer = $this->players[$this->currentPlayerIndex];
        $roll = $this->dices->roll();
        $newPosition = ($currentPlayer->position + $roll) % count($this->board); // Assure un cycle sur le plateau
        $currentPlayer->move($roll);

        $this->handleLanding($currentPlayer, $newPosition);

        // Gère le passage à travers la case départ ou d'autres logiques spéciales
        // ...

        // Change de joueur
        $this->currentPlayerIndex = ($this->currentPlayerIndex + 1) % count($this->players);
    }

    private function handleLanding(Player $player, int $position) {
        $space = $this->board[$position];

        // Ici, tu pourras ajouter une logique pour déterminer le type de case et agir en conséquence
        if ($space instanceof Property && $space->currentOwner === null) {
            // Propose d'acheter la propriété, etc.
        } elseif ($space instanceof ChanceCard) {
            // Tirer une carte Chance
        } elseif ($space instanceof CommunityChest) {
            // Tirer une carte Communauté
        }
        // Ajoute d'autres cas au besoin
    }
}

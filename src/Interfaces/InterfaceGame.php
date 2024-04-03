<?php

namespace App\Interfaces;

use App\Classes\Player;
use App\Classes\Board;

interface InterfaceGame {
    /**
     * Construit une nouvelle instance du jeu.
     *
     * @param Player[] $players Un tableau des joueurs participant au jeu.
     * @param Board $board Le plateau de jeu utilisé.
     */
    public function __construct(array $players, Board $board);

    /**
     * Joue un tour pour le joueur actuel.
     */
    public function playTurn(): void;

    /**
     * Gère l'atterrissage d'un joueur sur une case spécifique du plateau.
     *
     * @param Player $player Le joueur qui atterrit sur une case.
     * @param int $position La position du joueur sur le plateau.
     */
    private function handleLanding(Player $player, int $position);
}

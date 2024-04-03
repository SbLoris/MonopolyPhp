<?php

namespace App\Interfaces;

use App\Classes\Player;
use App\Classes\Game;

interface InterfaceLuckCard {
    /**
     * Construit une carte Chance avec une description et une action spécifique.
     *
     * @param string $description La description de l'action de la carte.
     * @param callable $action L'action à exécuter lorsque la carte est utilisée.
     */
    public function __construct(string $description, callable $action);

    /**
     * Exécute l'action associée à la carte sur le joueur et potentiellement affecte le jeu.
     *
     * @param Player $player Le joueur qui a tiré la carte Chance.
     * @param Game $game L'instance du jeu pour permettre l'accès et la modification de l'état global du jeu.
     */
    public function execute(Player $player, Game $game): void;
}

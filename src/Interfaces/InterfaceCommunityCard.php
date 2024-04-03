<?php

namespace App\Interfaces;

use App\Classes\Player;
use App\Classes\Game;

interface InterfaceCommunityCard {
    /**
     * Construit une carte de la caisse de communauté avec une description et une action.
     *
     * @param string $description Une description de ce que la carte fait.
     * @param callable $action L'action à exécuter lorsque la carte est tirée.
     */
    public function __construct(string $description, callable $action);

    /**
     * Exécute l'action associée à la carte.
     *
     * @param Player $player Le joueur sur lequel l'action de la carte va s'appliquer.
     * @param Game $game L'instance du jeu, permettant d'accéder à l'état global du jeu si nécessaire.
     */
    public function execute(Player $player, Game $game): void;
}

<?php

namespace App\Classes;

use App\Interfaces\InterfaceChanceSpace;
use App\Player;
use App\Game;

class ChanceSpace implements InterfaceChanceSpace
{
    public string $description;

    public function __construct(string $description)
    {
        $this->description = $description;
    }

    public function execute(Player $player, Game $game)
    {
        // Todo ajouter le code qui execute l'action
    }
}

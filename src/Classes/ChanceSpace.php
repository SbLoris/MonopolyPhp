<?php

namespace App\Classes;

use App\Interfaces\InterfaceChanceSpace;
use App\Classes\Player; // Utilisation du namespace correct pour la classe Player
use App\Classes\Game; // Utilisation du namespace correct pour la classe Game

class ChanceSpace implements InterfaceChanceSpace
{
    public string $description;
    public $action;

    public function __construct(string $description)
    {
        $this->description = $description;
    }

    public function setAction($action): void
    {
        $this->action = $action;
    }

    public function execute(Player $player, Game $game): void // Utilisation du namespace correct pour la classe Player et Game
    {
        if ($this->action !== null && is_callable($this->action)) {
            call_user_func($this->action, $player, $game);
        }
    }
}

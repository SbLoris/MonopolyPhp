<?php

namespace App\Classes;

use App\Interfaces\InterfaceCommunityChestSpace;

class CommunityChestSpace implements InterfaceCommunityChestSpace {
    public string $description;
    public callable $action;

    public function __construct(string $description, callable $action) {
        $this->description = $description;
        $this->action = $action;
    }

    public function execute(Player $player, Game $game) {
        call_user_func($this->action, $player, $game);
    }
}

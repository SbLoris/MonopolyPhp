<?php

namespace App\Classes;

class LuckCard implements InterfaceLuckCard {
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

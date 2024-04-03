<?php

namespace App\Classes;

use App\Interfaces\InterfaceJail;

class Jail implements InterfaceJail {
    private array $playersInJail = [];

    public function sendToJail(Player $player): void {
        $this->playersInJail[$player->getId()] = true;
    }

    public function releaseFromJail(Player $player): bool {
        if ($this->isPlayerInJail($player)) {
            unset($this->playersInJail[$player->getId()]);
            return true;
        }
        return false;
    }

    public function isPlayerInJail(Player $player): bool {
        return isset($this->playersInJail[$player->getId()]);
    }

    public function attemptEscape(Player $player): bool {
        //TODO: ajouter fonctionnement pour sortir de prison
    }
}

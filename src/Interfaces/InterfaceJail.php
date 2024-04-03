<?php

namespace App\Interfaces;

use App\Classes\Player;

interface InterfaceJail {
    public function sendToJail(Player $player): void;
    public function releaseFromJail(Player $player): bool;
    public function isPlayerInJail(Player $player): bool;
    public function attemptEscape(Player $player): bool;
}

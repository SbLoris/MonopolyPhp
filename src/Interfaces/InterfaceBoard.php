<?php

namespace App\Interfaces;

use App\Classes\Space;


interface InterfaceBoard {
    /**
     * Récupère une case du plateau par sa position.
     *
     * @param int $position La position de la case sur le plateau.
     * @return ?Space La case à la position spécifiée, ou null si aucune case n'est trouvée.
     */
    public function getSpace(int $position): ?Space;

    /**
     * Initialise les cases du plateau.
     *
     * Cette méthode sera responsable de l'initialisation de toutes les cases sur le plateau,
     * y compris les propriétés, les chances, les caisses de communauté, etc.
     */
    public function initializeSpaces(): void;
}

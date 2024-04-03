<?php

namespace App\Interfaces;

interface InterfaceBoard {
    /**
     * Récupère une case du plateau par sa position.
     *
     * @param int $position La position de la case sur le plateau.
     * @return ?array La case à la position spécifiée, ou null si aucune case n'est trouvée.
     */
    public function getSpace(int $position): ?array;

    /**
     * Initialise les cases du plateau.
     *
     * Cette méthode sera responsable de l'initialisation de toutes les cases sur le plateau,
     * y compris les propriétés, les chances, les caisses de communauté, etc.
     */
    public function initializeSpaces(): void;
}

<?php

namespace App\Interfaces;

use App\Classes\Player;

interface InterfaceProperty {
    /**
     * Construit une propriété avec des attributs spécifiques.
     *
     * @param string $name Le nom de la propriété.
     * @param string $color La couleur du groupe auquel appartient la propriété.
     * @param float $purchasePrice Le prix d'achat de la propriété.
     * @param float $housePrice Le coût pour ajouter une maison à la propriété.
     * @param float $hotelPrice Le coût pour convertir les maisons en hôtel.
     * @param array $rentPrices Les prix de loyer en fonction du nombre de maisons/hôtels.
     * @param bool $isRailroad Indique si la propriété est une gare.
     */
    public function __construct(string $name, string $color, float $purchasePrice, float $housePrice, float $hotelPrice, array $rentPrices, bool $isRailroad);

    /**
     * Permet à un joueur d'acheter la propriété s'il n'y a pas de propriétaire actuel.
     *
     * @param Player $player Le joueur qui tente d'acheter la propriété.
     * @return bool True si l'achat est réussi, False sinon.
     */
    public function buyProperty(Player $player): bool;

    /**
     * Ajoute une maison à la propriété si le joueur en est le propriétaire.
     *
     * @param Player $player Le propriétaire de la propriété.
     * @return bool True si une maison est ajoutée, False sinon.
     */
    public function addHouse(Player $player): bool;

    /**
     * Convertit les maisons de la propriété en un hôtel.
     *
     * @param Player $player Le propriétaire de la propriété.
     * @return bool True si la conversion est réussie, False sinon.
     */
    public function convertToHotel(Player $player): bool;

    /**
     * Calcule le loyer basé sur le nombre actuel de maisons ou la présence d'un hôtel.
     *
     * @return float Le montant du loyer.
     */
    public function calculateRent(): float;
}

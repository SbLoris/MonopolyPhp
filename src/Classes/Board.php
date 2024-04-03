<?php

namespace App\Classes;

class Board implements InterfaceBoard {
    public array $spaces = [];

    public function __construct() {
        $this->initializeSpaces();
    }

    private function initializeSpaces() {
        $this->spaces[0,40] = new StartSpace("Case Départ");

        // Ajoute les propriétés en suivant l'ordre et les informations réels du Monopoly
        // Les valeurs ci-dessous sont des exemples et doivent être ajustées
        $this->addProperties();

        // Cases Chance et Communauté, alternées dans le plateau
        $this->spaces[7,22,36] = new ChanceSpace();
        $this->spaces[2,17,33] = new CommunityChestSpace();
        // Continuer à placer ces cases à des positions spécifiques

        // Taxes et pénalités
        $this->spaces[4] = new TaxSpace("Impôts sur le revenu", 200);

        // En prison / Simple visite
        $this->spaces[10] = new JailSpace("En prison / Simple visite");

        // Ajoute les 4 gares
        $this->addRailroads();

        // Compagnies de service public
        $this->spaces[12, 28] = new Utility("Compagnie des eaux");

        // Aller en prison
        $this->spaces[30] = new GoToJailSpace("Aller en prison");

        // Case parking gratuit
        $this->spaces[20] = new FreeParkingSpace("Parking Gratuit");

        // Taxe de luxe
        $this->spaces[38] = new LuxuryTaxSpace("Taxe de luxe", 75);
    }

 private function addProperties() {
     // Marron (ou violet foncé)
     $this->spaces[1] = new Property("Boulevard de Belleville", "Brown", 60, 50, 50, [2, 10, 30, 90, 160, 250], false);
     $this->spaces[3] = new Property("Rue Lecourbe", "Brown", 60, 50, 50, [4, 20, 60, 180, 320, 450], false);

     // Bleu clair
     $this->spaces[6] = new Property("Rue de Vaugirard", "Light Blue", 100, 50, 50, [6, 30, 90, 270, 400, 550], false);
     $this->spaces[8] = new Property("Rue de Courcelles", "Light Blue", 100, 50, 50, [6, 30, 90, 270, 400, 550], false);
     $this->spaces[9] = new Property("Avenue de la République", "Light Blue", 120, 50, 50, [8, 40, 100, 300, 450, 600], false);

     // Violet (ou rose)
     $this->spaces[11] = new Property("Boulevard de la Villette", "Purple", 140, 100, 100, [10, 50, 150, 450, 625, 750], false);
     $this->spaces[13] = new Property("Avenue de Neuilly", "Purple", 140, 100, 100, [10, 50, 150, 450, 625, 750], false);
     $this->spaces[14] = new Property("Rue de Paradis", "Purple", 160, 100, 100, [12, 60, 180, 500, 700, 900], false);

     // Orange
     $this->spaces[16] = new Property("Avenue Mozart", "Orange", 180, 100, 100, [14, 70, 200, 550, 750, 950], false);
     $this->spaces[18] = new Property("Boulevard Saint-Michel", "Orange", 180, 100, 100, [14, 70, 200, 550, 750, 950], false);
     $this->spaces[19] = new Property("Place Pigalle", "Orange", 200, 100, 100, [16, 80, 220, 600, 800, 1000], false);

     // Rouge
     $this->spaces[21] = new Property("Avenue Matignon", "Red", 220, 150, 150, [18, 90, 250, 700, 875, 1050], false);
     $this->spaces[23] = new Property("Boulevard Malesherbes", "Red", 220, 150, 150, [18, 90, 250, 700, 875, 1050], false);
     $this->spaces[24] = new Property("Avenue Henri-Martin", "Red", 240, 150, 150, [20, 100, 300, 750, 925, 1100], false);

     // Jaune
     $this->spaces[29] = new Property("Faubourg Saint-Honoré", "Yellow", 260, 150, 150, [22, 110, 330, 800, 975, 1150], false);
     $this->spaces[27] = new Property("Place de la Bourse", "Yellow", 260, 150, 150, [22, 110, 330, 800, 975, 1150], false);
     $this->spaces[26] = new Property("Rue La Fayette", "Yellow", 280, 150, 150, [24, 120, 360, 850, 1025, 1200], false);

     // Vert
     $this->spaces[31] = new Property("Avenue de Breteuil", "Green", 300, 200, 200, [26, 130, 390, 900, 1100, 1275], false);
     $this->spaces[32] = new Property("Avenue Foch", "Green", 300, 200, 200, [26, 130, 390, 900, 1100, 1275], false);
     $this->spaces[34] = new Property("Boulevard des Capucines", "Green", 320, 200, 200, [28, 150, 450, 1000, 1200, 1400], false);

     // Bleu foncé
     $this->spaces[37] = new Property("Avenue des Champs-Élysées", "Dark Blue", 350, 200, 200, [35, 175, 500, 1100, 1300, 1500], false);
     $this->spaces[39] = new Property("Rue de la Paix", "Dark Blue", 400, 200, 200, [50, 200, 600, 1400, 1700, 2000], false);
 }

    private function addRailroads() {
        // Ajoute les 4 gares
        $this->spaces[5] = new Railroad("Gare Montparnasse");
        $this->spaces[15] = new Railroad("Gare de Lyon");
        $this->spaces[25] = new Railroad("Gare du Nord");
        $this->spaces[35] = new Railroad("Gare Saint-Lazare");
    }

    public function getSpace(int $position): ?Space {
        return $this->spaces[$position] ?? null;
    }
}

<?php
namespace App\Classes;

use App\Interfaces\InterfaceBoard;

class Board implements InterfaceBoard
{
    public array $spaces = [];

    public function __construct()
    {
        $this->initializeSpaces();
    }

    public function initializeSpaces(): void
    {
        $this->spaces[0] = new StartSpace('Case Départ');

        $this->addProperties();

        // Cases Chance et Communauté, alternées dans le plateau
        $this->spaces[7] = new ChanceSpace();
        $this->spaces[22] = new ChanceSpace();
        $this->spaces[36] = new ChanceSpace();
        $this->spaces[2] = new CommunityChestSpace();
        $this->spaces[17] = new CommunityChestSpace();
        $this->spaces[33] = new CommunityChestSpace();

        // Taxes et pénalités
        $this->spaces[4] = new TaxSpace('Impôts sur le revenu', 200);

        // En prison / Simple visite
        $this->spaces[10] = new JailSpace('En prison / Simple visite');

        $this->addRailroads();

        // Compagnies de service public
        $this->spaces[12] = new Utility('Compagnie de distribution d\'électricité');
        $this->spaces[28] = new Utility('Compagnie des eaux');

        // Aller en prison
        $this->spaces[30] = new GoToJailSpace('Aller en prison');

        // Case parking gratuit
        $this->spaces[20] = new FreeParkingSpace('Parking Gratuit');

        // Taxe de luxe
        $this->spaces[38] = new LuxuryTaxSpace('Taxe de luxe', 75);
    }

public function addProperties()
{
    // Marron (ou violet foncé)
    $this->spaces[1] = new Property("Boulevard de Belleville", "Brown", 60, 50, 50, [2, 10, 30, 90, 160, 250]);
    $this->spaces[3] = new Property("Rue Lecourbe", "Brown", 60, 50, 50, [4, 20, 60, 180, 320, 450]);

    // Bleu clair
    $this->spaces[6] = new Property("Rue de Vaugirard", "Light Blue", 100, 50, 50, [6, 30, 90, 270, 400, 550]);
    $this->spaces[8] = new Property("Rue de Courcelles", "Light Blue", 100, 50, 50, [6, 30, 90, 270, 400, 550]);
    $this->spaces[9] = new Property("Avenue de la République", "Light Blue", 120, 50, 50, [8, 40, 100, 300, 450, 600]);

    // Violet (ou rose)
    $this->spaces[11] = new Property("Boulevard de la Villette", "Purple", 140, 100, 100, [10, 50, 150, 450, 625, 750]);
    $this->spaces[13] = new Property("Avenue de Neuilly", "Purple", 140, 100, 100, [10, 50, 150, 450, 625, 750]);
    $this->spaces[14] = new Property("Rue de Paradis", "Purple", 160, 100, 100, [12, 60, 180, 500, 700, 900]);

    // Orange
    $this->spaces[16] = new Property("Avenue Mozart", "Orange", 180, 100, 100, [14, 70, 200, 550, 750, 950]);
    $this->spaces[18] = new Property("Boulevard Saint-Michel", "Orange", 180, 100, 100, [14, 70, 200, 550, 750, 950]);
    $this->spaces[19] = new Property("Place Pigalle", "Orange", 200, 100, 100, [16, 80, 220, 600, 800, 1000]);

    // Rouge
    $this->spaces[21] = new Property("Avenue Matignon", "Red", 220, 150, 150, [18, 90, 250, 700, 875, 1050]);
    $this->spaces[23] = new Property("Boulevard Malesherbes", "Red", 220, 150, 150, [18, 90, 250, 700, 875, 1050]);
    $this->spaces[24] = new Property("Avenue Henri-Martin", "Red", 240, 150, 150, [20, 100, 300, 750, 925, 1100]);

    // Jaune
    $this->spaces[26] = new Property("Rue La Fayette", "Yellow", 280, 150, 150, [24, 120, 360, 850, 1025, 1200]);
    $this->spaces[27] = new Property("Place de la Bourse", "Yellow", 260, 150, 150, [22, 110, 330, 800, 975, 1150]);
    $this->spaces[29] = new Property("Faubourg Saint-Honoré", "Yellow", 260, 150, 150, [22, 110, 330, 800, 975, 1150]);

    // Vert
    $this->spaces[31] = new Property("Avenue de Breteuil", "Green", 300, 200, 200, [26, 130, 390, 900, 1100, 1275]);
    $this->spaces[32] = new Property("Avenue Foch", "Green", 300, 200, 200, [26, 130, 390, 900, 1100, 1275]);
    $this->spaces[34] = new Property("Boulevard des Capucines", "Green", 320, 200, 200, [28, 150, 450, 1000, 1200, 1400]);

    // Bleu foncé
    $this->spaces[37] = new Property("Avenue des Champs-Élysées", "Dark Blue", 350, 200, 200, [35, 175, 500, 1100, 1300, 1500]);
    $this->spaces[39] = new Property("Rue de la Paix", "Dark Blue", 400, 200, 200, [50, 200, 600, 1350, 1750]);
}


    public function addRailroads()
    {
        // Ajoute les 4 gares
        $this->spaces[5] = new Railroad('Gare Montparnasse', 200, [25, 50, 100, 200]);
        $this->spaces[15] = new Railroad('Gare De Lyon', 200, [25, 50, 100, 200]);
        $this->spaces[25] = new Railroad('Gare Du Nord', 200, [25, 50, 100, 200]);
        $this->spaces[35] = new Railroad('Gare Saint-Nazaire', 200, [25, 50, 100, 200]);
    }

    public function getSpace(int $position): ?Space
    {
        return $this->spaces[$position] ?? null;
    }
}

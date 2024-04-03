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
        $this->spaces[0] = ['type' => 'StartSpace', 'name' => 'Case Départ'];

        $this->addProperties();

        // Cases Chance et Communauté, alternées dans le plateau
        $this->spaces[7] = ['type' => 'ChanceSpace'];
        $this->spaces[22] = ['type' => 'ChanceSpace'];
        $this->spaces[36] = ['type' => 'ChanceSpace'];
        $this->spaces[2] = ['type' => 'CommunityChestSpace'];
        $this->spaces[17] = ['type' => 'CommunityChestSpace'];
        $this->spaces[33] = ['type' => 'CommunityChestSpace'];

        // Taxes et pénalités
        $this->spaces[4] = ['type' => 'TaxSpace', 'name' => 'Impôts sur le revenu', 'amount' => 200];

        // En prison / Simple visite
        $this->spaces[10] = ['type' => 'JailSpace', 'name' => 'En prison / Simple visite'];

        $this->addRailroads();

        // Compagnies de service public
        $this->spaces[12] = ['type' => 'Utility', 'name' => 'Compagnie de distribution d\'électricité'];
        $this->spaces[28] = ['type' => 'Utility', 'name' => 'Compagnie des eaux'];

        // Aller en prison
        $this->spaces[30] = ['type' => 'GoToJailSpace', 'name' => 'Aller en prison'];

        // Case parking gratuit
        $this->spaces[20] = ['type' => 'FreeParkingSpace', 'name' => 'Parking Gratuit'];

        // Taxe de luxe
        $this->spaces[38] = ['type' => 'LuxuryTaxSpace', 'name' => 'Taxe de luxe', 'amount' => 75];
    }

 public function addProperties() {
     // Marron (ou violet foncé)
         $this->spaces[1] = [
             'type' => 'property',
             'name' => "Boulevard de Belleville",
             'color' => "Brown",
             'price' => 60,
             'housePrice' => 50,
             'hotelPrice' => 50,
             'rent' => [2, 10, 30, 90, 160, 250],
         ];
         $this->spaces[3] = [
             'type' => 'property',
             'name' => "Rue Lecourbe",
             'color' => "Brown",
             'price' => 60,
             'housePrice' => 50,
             'hotelPrice' => 50,
             'rent' => [4, 20, 60, 180, 320, 450],
         ];

         // Bleu clair
         $this->spaces[6] = [
             'type' => 'property',
             'name' => "Rue de Vaugirard",
             'color' => "Light Blue",
             'price' => 100,
             'housePrice' => 50,
             'hotelPrice' => 50,
             'rent' => [6, 30, 90, 270, 400, 550],
         ];
         $this->spaces[8] = [
             'type' => 'property',
             'name' => "Rue de Courcelles",
             'color' => "Light Blue",
             'price' => 100,
             'housePrice' => 50,
             'hotelPrice' => 50,
             'rent' => [6, 30, 90, 270, 400, 550],
         ];
         $this->spaces[9] = [
             'type' => 'property',
             'name' => "Avenue de la République",
             'color' => "Light Blue",
             'price' => 120,
             'housePrice' => 50,
             'hotelPrice' => 50,
             'rent' => [8, 40, 100, 300, 450, 600],
         ];


       // Violet (ou rose)
         $this->spaces[11] = [
             'type' => 'property',
             'name' => "Boulevard de la Villette",
             'color' => "Purple",
             'price' => 140,
             'housePrice' => 100,
             'hotelPrice' => 100,
             'rent' => [10, 50, 150, 450, 625, 750],
         ];
         $this->spaces[13] = [
             'type' => 'property',
             'name' => "Avenue de Neuilly",
             'color' => "Purple",
             'price' => 140,
             'housePrice' => 100,
             'hotelPrice' => 100,
             'rent' => [10, 50, 150, 450, 625, 750],
         ];
         $this->spaces[14] = [
             'type' => 'property',
             'name' => "Rue de Paradis",
             'color' => "Purple",
             'price' => 160,
             'housePrice' => 100,
             'hotelPrice' => 100,
             'rent' => [12, 60, 180, 500, 700, 900],
         ];

         // Orange
         $this->spaces[16] = [
             'type' => 'property',
             'name' => "Avenue Mozart",
             'color' => "Orange",
             'price' => 180,
             'housePrice' => 100,
             'hotelPrice' => 100,
             'rent' => [14, 70, 200, 550, 750, 950],
         ];
         $this->spaces[18] = [
             'type' => 'property',
             'name' => "Boulevard Saint-Michel",
             'color' => "Orange",
             'price' => 180,
             'housePrice' => 100,
             'hotelPrice' => 100,
             'rent' => [14, 70, 200, 550, 750, 950],
         ];
         $this->spaces[19] = [
             'type' => 'property',
             'name' => "Place Pigalle",
             'color' => "Orange",
             'price' => 200,
             'housePrice' => 100,
             'hotelPrice' => 100,
             'rent' => [16, 80, 220, 600, 800, 1000],
         ];

     // Rouge
     $this->spaces[21] = [
         'type' => 'property',
         'name' => "Avenue Matignon",
         'color' => "Red",
         'price' => 220,
         'housePrice' => 150,
         'hotelPrice' => 150,
         'rent' => [18, 90, 250, 700, 875, 1050],
     ];
     $this->spaces[23] = [
         'type' => 'property',
         'name' => "Boulevard Malesherbes",
         'color' => "Red",
         'price' => 220,
         'housePrice' => 150,
         'hotelPrice' => 150,
         'rent' => [18, 90, 250, 700, 875, 1050],
     ];
     $this->spaces[24] = [
         'type' => 'property',
         'name' => "Avenue Henri-Martin",
         'color' => "Red",
         'price' => 240,
         'housePrice' => 150,
         'hotelPrice' => 150,
         'rent' => [20, 100, 300, 750, 925, 1100],
     ];

     // Jaune
     $this->spaces[29] = [
         'type' => 'property',
         'name' => "Faubourg Saint-Honoré",
         'color' => "Yellow",
         'price' => 260,
         'housePrice' => 150,
         'hotelPrice' => 150,
         'rent' => [22, 110, 330, 800, 975, 1150],
     ];
     $this->spaces[27] = [
         'type' => 'property',
         'name' => "Place de la Bourse",
         'color' => "Yellow",
         'price' => 260,
         'housePrice' => 150,
         'hotelPrice' => 150,
         'rent' => [22, 110, 330, 800, 975, 1150],
     ];
     $this->spaces[26] = [
         'type' => 'property',
         'name' => "Rue La Fayette",
         'color' => "Yellow",
         'price' => 280,
         'housePrice' => 150,
         'hotelPrice' => 150,
         'rent' => [24, 120, 360, 850, 1025, 1200],
     ];

     // Vert
     $this->spaces[31] = [
         'type' => 'property',
         'name' => "Avenue de Breteuil",
         'color' => "Green",
         'price' => 300,
         'housePrice' => 200,
         'hotelPrice' => 200,
         'rent' => [26, 130, 390, 900, 1100, 1275],
     ];
     $this->spaces[32] = [
         'type' => 'property',
         'name' => "Avenue Foch",
         'color' => "Green",
         'price' => 300,
         'housePrice' => 200,
         'hotelPrice' => 200,
         'rent' => [26, 130, 390, 900, 1100, 1275],
     ];
     $this->spaces[34] = [
         'type' => 'property',
         'name' => "Boulevard des Capucines",
         'color' => "Green",
         'price' => 320,
         'housePrice' => 200,
         'hotelPrice' => 200,
         'rent' => [28, 150, 450, 1000, 1200, 1400],
     ];

     // Bleu foncé
     $this->spaces[37] = [
         'type' => 'property',
         'name' => "Avenue des Champs-Élysées",
         'color' => "Dark Blue",
         'price' => 350,
         'housePrice' => 200,
         'hotelPrice' => 200,
         'rent' => [35, 175, 500, 1100, 1300, 1500],
         ];

      $this->spaces[39] = [
          'type' => 'property',
          'name' => "Rue de la Paix",
          'color' => "Dark Blue",
          'price' => 400,
          'housePrice' => 200,
          'hotelPrice' => 200,
          'rent' => [50, 200,  600, 1350, 1750],
          ];
  }
    private function createProperty($name, $color, $price, $rent) {
          return [
              'type' => 'Property',
              'name' => $name,
              'color' => $color,
              'price' => $price,
              'rent' => $rent,
          ];
      }

    private function createProperty($name, $color, $price, $rent)
    {
        return [
            'type' => 'Property',
            'name' => $name,
            'color' => $color,
            'price' => $price,
            'rent' => $rent,

        ];
    }

    public function addRailroads()
    {
        // Ajoute les 4 gares
        $this->spaces[5] = ['type' => 'Railroad', 'name' => 'Gare Montparnasse', 'price' => 200, 'rent' => [25, 50, 100, 200]];
        $this->spaces[15] = ['type' => 'Railroad', 'name' => 'Gare De Lyon', 'price' => 200, 'rent' => [25, 50, 100, 200]];
        $this->spaces[25] = ['type' => 'Railroad', 'name' => 'Gare Du Nord', 'price' => 200, 'rent' => [25, 50, 100, 200]];
        $this->spaces[35] = ['type' => 'Railroad', 'name' => 'Gare Saint-Nazaire', 'price' => 200, 'rent' => [25, 50, 100, 200]];
    }

    public function getSpace(int $position): ?Space
    {
        return $this->spaces[$position] ?? null;
    }
}

<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Classes\Board;
use App\Classes\Property;
use App\Classes\Railroad;
use App\Classes\Utility;
use App\Classes\JailSpace;
use App\Classes\GoToJailSpace;
use App\Classes\FreeParkingSpace;
use App\Classes\TaxSpace;
use App\Classes\StartSpace;
use App\Classes\ChanceSpace;
use App\Classes\CommunityChestSpace;

final class BoardTest extends TestCase {

    private $board;

    protected function setUp(): void {
        $this->board = new Board();
    }

    public function testBoardInitialization(): void {
        // Test si le plateau contient un nombre spécifique d'espaces
        $this->assertCount(40, $this->board->spaces);
    }

    public function testStartSpaceInitialization(): void {
        // Test si la première case est bien une case de départ
        $this->assertInstanceOf(StartSpace::class, $this->board->getSpace(0));
    }

    public function testPropertyInitialization(): void {
        // Test si les propriétés spécifiques sont correctement initialisées
        $this->assertInstanceOf(Property::class, $this->board->getSpace(1));
        $this->assertInstanceOf(Property::class, $this->board->getSpace(39));
    }

    public function testRailroadInitialization(): void {
        // Test si les gares sont correctement initialisées
        $this->assertInstanceOf(Railroad::class, $this->board->getSpace(5));
        $this->assertInstanceOf(Railroad::class, $this->board->getSpace(35));
    }

    public function testUtilityInitialization(): void {
        // Test si les compagnies de service public sont correctement initialisées
        $this->assertInstanceOf(Utility::class, $this->board->getSpace(12));
        $this->assertInstanceOf(Utility::class, $this->board->getSpace(28));
    }

    public function testSpecialSpacesInitialization(): void {
        // Test si les cases spéciales comme la prison sont correctement initialisées
        $this->assertInstanceOf(JailSpace::class, $this->board->getSpace(10));
        $this->assertInstanceOf(GoToJailSpace::class, $this->board->getSpace(30));
        $this->assertInstanceOf(FreeParkingSpace::class, $this->board->getSpace(20));
        $this->assertInstanceOf(TaxSpace::class, $this->board->getSpace(4));
    }

    public function testChanceCommunityChestSpaces(): void {
        // Test si les cases Chance et Communauté sont correctement initialisées
        $this->assertInstanceOf(ChanceSpace::class, $this->board->getSpace(7));
        $this->assertInstanceOf(CommunityChestSpace::class, $this->board->getSpace(2));
    }

}

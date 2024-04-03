<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;

use App\Classes\Dice;

final class DiceTest extends TestCase {

    public function testNumberOfFaces(): void
    {
        $dice = new Dice();
        $this->assertSame($dice->getNbFace(), 6);
    }

    // public function testDiceCreation(): void
    // {
    //     // code ici...
    // }

    public function testRoll(): void
    {
        $dice = new Dice();
        // le nombre généré est bien de type "int"
        $nb = $dice->roll();
        $this->assertTrue( gettype($nb) == "integer" );
        // le nombre généré doit être entre 1 et le nombre de face du dé et il est retourné
        $this->assertTrue( $nb >= 1 && $nb <= $dice->getNbFace() );
        // le nombre généré est bien stocké dans $this->value
        $this->assertTrue($nb == $dice->getValue());
        // le nombre généré est bien aléatoire
        $base_value = $dice->roll();
        $nb_rounds = 10;
        $result = False;
        while(!$result && $nb_rounds >= 0) {
            $roll_value = $dice->roll();
            $nb_rounds--;
            if($roll_value != $base_value) {
                $result = True;
            }
        }
        $this->assertTrue($result);
    }

}
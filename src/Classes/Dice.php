<?php

namespace App\Classes;

use App\Interfaces\InterfaceDice;

class Dice implements InterfaceDice {
    
    private int $nbFace;
    private int $value;
    
    public function __construct(int $nbFace = 6)
    {
        $this->nbFace = $nbFace;
    }

    public function roll(): int
    {
        $this->value = random_int(1, $this->nbFace);
        return $this->value;
    }

    // Accesseurs & Mutateurs
    // Getters & Setters
    public function getNbFace(): int
    {
        return $this->nbFace;
    }

    /**
     * Non existance du setter car pas besoin de modifier le $nbFace pendant une partie ou après la création du dé
     *
     * @param [type] $newValue
     * @return void
     */
    // public function setNbFace($newValue): void
    // {
    //     $this->nbFace = $newValue;
    // }

    public function getValue(): int
    {
        return $this->value;
    }

    // Imaginons que je veuille que ça soit possible
    // public function setValue(int $newValue): void
    // {
    //     // rajouter toutes les vérification integer + entre 1 et 6
    //     if( $newValue <= $this->nbFace &&  $newValue >= 1 ) {
    //         $this->value = $newValue;
    //     }
    // }

}
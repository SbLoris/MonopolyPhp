<?php

namespace App\Classes;
use App\Interfaces\InterfaceJail;

class JailSpace
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

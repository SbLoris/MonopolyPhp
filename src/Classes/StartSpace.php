<?php

namespace App\Classes;

use App\Interfaces\InterfaceStartSpace;

class StartSpace implements InterfaceStartSpace
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

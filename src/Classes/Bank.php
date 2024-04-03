<?php

namespace App\Classes;

use App\Interfaces\InterfaceBank;
use App\Config\Config;

class Bank implements InterfaceBank {

    public $cash;
    public $houses;
    public $hotels;

    public function __construct()
    {
        $this->cash = Config::$cash;
        $this->houses = Config::$houses;
        $this->hotels = Config::$hotels;
    }

    public function cashout(int $amount): bool
    {
        if($amount > $this->cash || $amount <= 0) {
            return false;
        }

        $this->cash -= $amount;
        return true;
    }

    public function cashin(int $amount): bool
    {
        if( ($amount + $this->cash) > 20580 ) {
            return false;
        }

        $this->cash += $amount;
        return true;
    }

    public function giveHouse(): bool
    {
        if($this->houses <= 0) {
            return false;
        }

        $this->houses--;
        return true;
    }

    public function takeHouse(): bool
    {
        if($this->houses >= Config::$houses) {
            return false;
        }

        $this->houses++;
        return true;
    }

    public function giveHotel(): bool
    {
        if($this->hotels <= 0) {
            return false;
        }

        $this->hotels--;
        return true;
    }

    public function takeHotel(): bool
    {
        if($this->hotels >= Config::$hotels) {
            return false;
        }

        $this->hotels++;
        return true;
    }



}
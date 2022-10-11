<?php

namespace App;

trait CappucinoTrait 
{
    public function makeCappucino()
    {
        echo static::class . " is making Cappucino" . PHP_EOL;
    }
    
    public function makeCoffee()
    {
        echo "Making Coffee overriden in Trait" . PHP_EOL;
    }
}
<?php

namespace App;

class AllInOneCoffeeMaker extends CoffeeMaker 
{

    use LatteTrait;
    use CappucinoTrait;

    public function makeLatte()
    {
        echo "Making Latte (Updated) in the class using the trait" . PHP_EOL;
    }
}
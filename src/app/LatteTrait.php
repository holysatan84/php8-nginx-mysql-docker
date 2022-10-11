<?php

namespace App;

trait LatteTrait
{
    public function makeLatte()
    {
        echo static::class . " is making Latte" . PHP_EOL;
    }
}
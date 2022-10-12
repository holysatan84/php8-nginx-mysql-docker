<?php

namespace App;

use InvalidArgumentException;
use App\Exception\MissingBillingInfoException;

class Invoice
{
    public function __construct(public float $amount, private int $id = 0) {
        $this->id = mt_rand(10000, 99999);
    }
}
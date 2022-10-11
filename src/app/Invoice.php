<?php

namespace App;

class Invoice
{
    private string $id;

    public function __construct() {
        $this->id = uniqid("invoice_");
    }
}
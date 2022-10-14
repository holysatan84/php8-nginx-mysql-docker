<?php

  namespace App\Services;

  class SalesTaxService
  {

    public function __construct()
    {
    }

    public function calculate(float $amount, array $customer): float
    {
      return 1.0;
    }
  }

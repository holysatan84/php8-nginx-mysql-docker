<?php

  namespace App\Services;

  class GatewayService
  {

    public function __construct()
    {
    }

    public function charge(array $customer, float $amount, $tax): bool
    {
      return true;
    }
  }

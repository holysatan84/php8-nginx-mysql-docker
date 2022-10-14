<?php

  declare(strict_types=1);

  namespace App\Services;

  class InvoiceService
  {
    public function __construct(
      protected SalesTaxService $salesTaxService,
      protected GatewayService $gatewayService,
      protected EmailService $emailService
    )
    {
    }

    public function process(array $customer, float $amount): bool
    {

      $tax = $this->salesTaxService->calculate($amount, $customer);

      if(!$this->gatewayService->charge($customer, $amount, $tax)) {
        return false;
      }

      return $this->emailService->send($customer, 'receipt');
    }
  }

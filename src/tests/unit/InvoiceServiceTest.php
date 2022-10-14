<?php

  namespace Tests\unit;

  use App\Services\EmailService;
  use App\Services\GatewayService;
  use App\Services\InvoiceService;
  use App\Services\SalesTaxService;
  use PHPUnit\Framework\TestCase;

  class InvoiceServiceTest extends TestCase
  {

    public function test_it_process(): void
    {
      $salesTaxServiceMock = $this->createMock(SalesTaxService::class);
      $gatewayServiceMock = $this->createMock(GatewayService::class);
      $emailServiceMock = $this->createMock(EmailService::class);

      $salesTaxServiceMock->method('calculate')->willReturn(25.5);
      $gatewayServiceMock->method('charge')->willReturn(true);
      $emailServiceMock->method('send')->willReturn(true);

      //if I create an object of Invoice Service
      $invoiceService = new InvoiceService($salesTaxServiceMock, $gatewayServiceMock, $emailServiceMock);

      //and then  InvoiceService::process() is called
      $result = $invoiceService->process(["Some Customer"], 25.45);

      $this->assertTrue($result);
    }

  }

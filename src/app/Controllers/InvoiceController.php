<?php

  namespace App\Controllers;

  use App\Services\EmailService;
  use App\Services\GatewayService;
  use App\Services\InvoiceService;
  use App\Services\SalesTaxService;
  use App\View;

  class InvoiceController
  {
    public function __construct(
      private InvoiceService $invoiceService
    ) {
    }

    public function index(): View
    {
      return View::make('invoices/index');
    }

    public function create(): View
    {
      return View::make('invoices/create');
    }

    public function store(): void
    {

      $name = $_POST['name'];
      $amount = $_POST['amount'];

      $invoiceService = new InvoiceService(new SalesTaxService(), new GatewayService(), new EmailService());

      echo ($invoiceService->process(['name' => $name], $amount)) ? "Email with receipt sent" : "Processing failed";
    }
  }

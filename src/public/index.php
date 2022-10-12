<?php 
declare(strict_types = 1);

use App\Invoice;
use App\InvoiceCollection;

$autoloadFile = __DIR__ . "/../vendor/autoload.php";
if(!file_exists($autoloadFile))  exit("run composer install");
require_once __DIR__ . "/../vendor/autoload.php";

$invoiceCollection = new InvoiceCollection([new Invoice(15), new Invoice(20), new Invoice(25)]);

foreach($invoiceCollection as $invoice) {
    echo $invoice->amount . PHP_EOL;
}

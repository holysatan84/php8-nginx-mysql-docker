<?php 
declare(strict_types = 1);

use App\Customer;
use App\Exception\MissingBillingInfoException;
use App\Invoice;

$autoloadFile = __DIR__ . "/../vendor/autoload.php";

set_exception_handler(function (Throwable $e) {
    var_dump($e->getMessage());
});

if(!file_exists($autoloadFile))  exit("run composer install");
require_once __DIR__ . "/../vendor/autoload.php";


$invoice = new Invoice(new Customer(['foo' => 'bar']));

try {
    $invoice->process(-25);
} catch (MissingBillingInfoException|InvalidArgumentException $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
} finally {
    echo "This runs always" . PHP_EOL;
}


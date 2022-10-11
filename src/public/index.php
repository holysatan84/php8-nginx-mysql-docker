<?php 
declare(strict_types = 1);

use App\Invoice;

$autoloadFile = __DIR__ . "/../vendor/autoload.php";
if(!file_exists($autoloadFile))  exit("run composer install");
require_once __DIR__ . "/../vendor/autoload.php";

$invoice1 = new Invoice();
$invoice2 = new Invoice();

var_dump($invoice1 == $invoice2);
var_dump($invoice1 === $invoice2);

# cloned object comparision
$invoice3 = clone $invoice1;
var_dump($invoice1 == $invoice3);
var_dump($invoice1 === $invoice3);



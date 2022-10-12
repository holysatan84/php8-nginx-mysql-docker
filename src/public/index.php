<?php 
// declare(strict_types = 1);

use App\Invoice;

$autoloadFile = __DIR__ . "/../vendor/autoload.php";
if(!file_exists($autoloadFile))  exit("run composer install");
require_once __DIR__ . "/../vendor/autoload.php";

echo serialize(true) . PHP_EOL;
echo serialize(1) . PHP_EOL;
echo serialize(2.5) . PHP_EOL;
echo serialize('hello world') . PHP_EOL;
echo serialize([1,2,3]) . PHP_EOL;
echo serialize(['a' => 1, 'b' => 2]) . PHP_EOL;

$invoice = new Invoice();

echo serialize($invoice) . PHP_EOL;

echo unserialize(serialize(true)) . PHP_EOL;
echo unserialize(serialize(1)) . PHP_EOL;
echo unserialize(serialize(2.5)) . PHP_EOL;
echo unserialize(serialize('hello world')) . PHP_EOL;
var_dump(unserialize(serialize([1,2,3]))) . PHP_EOL;
var_dump(unserialize(serialize(['a' => 1, 'b' => 2]))) . PHP_EOL;


# cloning using clone is shallow clone, 
# while using serialize unserialize is deep cloning
var_dump(serialize($invoice)); 
var_dump(unserialize(serialize($invoice)));
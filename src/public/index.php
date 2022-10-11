<?php 
declare(strict_types = 1);

use App\AllInOneCoffeeMaker;
use App\AllInOneMaker;
use App\CappucinoMaker;
use App\CoffeeMaker;
use App\LatteMaker;

$autoloadFile = __DIR__ . "/../vendor/autoload.php";
if(!file_exists($autoloadFile))  exit("run composer install");
require_once __DIR__ . "/../vendor/autoload.php";


$coffeeMaker = new CoffeeMaker();
$coffeeMaker->makeCoffee();

$latteMaker = new LatteMaker();
$latteMaker->makeCoffee();
$latteMaker->makeLatte();

$cappucinoMaker = new CappucinoMaker();
$cappucinoMaker->makeCoffee();
$cappucinoMaker->makeCappucino();


$allInOneCoffeeMaker = new AllInOneCoffeeMaker();
$allInOneCoffeeMaker->makeCoffee();
$allInOneCoffeeMaker->makeLatte();
$allInOneCoffeeMaker->makeCappucino();
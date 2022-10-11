<?php 
declare(strict_types = 1);

$autoloadFile = __DIR__ . "/../vendor/autoload.php";
if(!file_exists($autoloadFile))  exit("run composer install");
require_once __DIR__ . "/../vendor/autoload.php";

$anonClassObj = new class(1, 2, 3) extends App\SomeClass implements App\SomeInterface {
    use App\SomeTrait;
    public function __construct(public int $x, public int $y, public int $z){}
};

var_dump($anonClassObj);

var_dump(get_class($anonClassObj));
<?php 
declare(strict_types = 1);

    use App\Controllers\Transactions;

    session_start();

$autoloadFile = __DIR__ . "/../vendor/autoload.php";
if(!file_exists($autoloadFile))  exit("run composer install");
require_once __DIR__ . "/../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


$transaction = new Transactions();

$transaction->transactions();

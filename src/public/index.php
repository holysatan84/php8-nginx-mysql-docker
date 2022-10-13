<?php 
declare(strict_types = 1);

session_start();

$autoloadFile = __DIR__ . "/../vendor/autoload.php";
if(!file_exists($autoloadFile))  exit("run composer install");
require_once __DIR__ . "/../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

define('VIEW_PATH', __DIR__ . '/../app/views/');

$router = new App\Router();

$router
    ->get('/', [App\Controllers\HomeController::class, 'index'])
    ->get('/invoices', [App\Controllers\InvoiceController::class, 'index'])
    ->get('/invoices/create', [App\Controllers\InvoiceController::class, 'create'])
    ->post('/invoices/create', [App\Controllers\InvoiceController::class, 'store']);

echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));
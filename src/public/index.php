<?php
declare(strict_types=1);

use App\Config;
  use App\Container;
  use App\Router;
  use App\Controllers\HomeController;
  use App\Controllers\InvoiceController;


  session_start();

$autoloadFile = __DIR__ . "/../vendor/autoload.php";
if (!file_exists($autoloadFile)) exit("run composer install");
require_once __DIR__ . "/../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

define('VIEW_PATH', __DIR__ . '/../app/views/');

  $container = new Container();
  $router    = new Router($container);

$router
    ->get('/', [HomeController::class, 'index'])
    ->get('/invoices', [InvoiceController::class, 'index'])
    ->get('/invoices/create', [InvoiceController::class, 'create'])
    ->post('/invoices/create', [InvoiceController::class, 'store']);

(
    new App\App(
        $router,
        ['uri' => $_SERVER['REQUEST_URI'], 'method' => strtolower($_SERVER['REQUEST_METHOD'])],
        new Config($_ENV)
    )
)->run();

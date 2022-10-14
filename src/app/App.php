<?php

  declare(strict_types=1);

  namespace App;

  use App\Exception\RouteNotFoundException;
  use App\Services\EmailService;
  use App\Services\GatewayService;
  use App\Services\InvoiceService;
  use App\Services\SalesTaxService;

  class App
  {

    private static DB $db;
    public static Container $container;

    /**
     * @param Router $router
     */
    public function __construct(protected Router $router, protected array $request, protected Config $config)
    {

      static::$db = new DB($config->db ?? []);
      static::$container = new Container();
      static::$container->set(InvoiceService::class, function (Container $container) {
        return new InvoiceService(
          $container->get(SalesTaxService::class),
          $container->get(GatewayService::class),
          $container->get(EmailService::class)
        );
      });

      static::$container->set(SalesTaxService::class, fn() => new SalesTaxService());
      static::$container->set(GatewayService::class, fn() => new GatewayService());
      static::$container->set(EmailService::class, fn() => new EmailService());

    }

    public static function db(): DB
    {
      return static::$db;
    }

    public function run(): void
    {
      try {
        echo $this->router->resolve($this->request['uri'], strtolower($this->request['method']));
      } catch (RouteNotFoundException $e) {
        http_response_code(404);

        echo View::make('error/404');
      }
    }
  }

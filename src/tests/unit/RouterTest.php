<?php

  declare(strict_types=1);

  use App\Exception\RouteNotFoundException;
  use App\Router;
  use PHPUnit\Framework\TestCase;

  class RouterTest extends TestCase
  {

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
      parent::__construct($name, $data, $dataName);
    }

    public function test_that_it_registers_a_route(): void
    {
      // when we call register method
      $this->router->register('get', '/users', ['Users', 'index']);

      // then we assert route is registered

      $expected = ['get' => ['/users' => ['Users', 'index']]];
      $this->assertSame($expected, $this->router->routes());
    }

    public function test_it_registers_a_get_route(): void
    {
      // if we call a get method,
      $this->router->get('/movies', ['Movies', 'index']);

      $expected = ['get' => ['/movies' => ['Movies', 'index']]];

      //it registers a get route

      $this->assertSame($expected, $this->router->routes());
    }

    public function test_it_registers_a_post_route(): void
    {
      // if we call a get method,
      $this->router->post('/movies', ['Movies', 'index']);

      $expected = ['post' => ['/movies' => ['Movies', 'index']]];

      //it registers a get route

      $this->assertSame($expected, $this->router->routes());
    }

    public function test_initiallly_no_routes_exists()
    {
      //there are no pre-existing routes
      $this->assertEmpty((new Router())->routes());
    }

    /**
     * @param string $stringUri
     * @param string $requestMethod
     * @return void
     * @dataProvider \Tests\unit\DataProviders\RouteNotFoundCaseDataProvider::routeNotFoundCases()
     * @throws RouteNotFoundException
     */
    public function test_route_not_found_exception_are_thrown(string $stringUri, string $requestMethod): void
    {
      $class = new class {
        public function delete(): bool
        {
          return true;
        }
      };

      $this->router->get('/class', [$class::class, 'get']);
      $this->router->get('/class', [$class::class, 'delete']);

      $this->expectException(RouteNotFoundException::class);
      $this->router->resolve($stringUri, $requestMethod);

    }

    public function test_resolve_isCallable()
    {
      $this->router->register('get', '/test', function() {
        return ['something', 'something_else'];
      });

      $this->assertSame(
        ['something', 'something_else'],
        $this->router->resolve('/test', 'get')
      );
    }

    public function test_method_exists(): void
    {
      $testRouteClass = new class {
        public function index(): array
        {
          return [1, 2, 3];
        }
      };
      $this->router->register('get', '/index', [$testRouteClass::class, 'index']);

      $this->assertSame(
        [1, 2, 3],
        $this->router->resolve('/index', 'get')
      );
    }
    protected function setUp(): void
    {
      parent::setUp();

      $this->router = new Router();

    }

    protected function tearDown(): void
    {
      parent::tearDown(); // TODO: Change the autogenerated stub

      unset($this->router);
    }
  }
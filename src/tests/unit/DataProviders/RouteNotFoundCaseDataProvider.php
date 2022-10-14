<?php

  namespace Tests\unit\DataProviders;

  class RouteNotFoundCaseDataProvider
  {

    public function routeNotFoundCases(): array
    {
      return [
        ['/class', 'put'],
        ['/classes', 'delete'],
        ['/someclass', 'fetch'],
      ];
    }
  }

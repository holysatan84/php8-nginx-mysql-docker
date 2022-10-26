<?php

    namespace Tests\DataProvider;

    class RouteDataProvider
    {
        public function routeNotFoundCases(): array
        {
            return [
              ['/users', 'put'],
              ['/invoices', 'post'],
              ['/users', 'get'],
              ['/users', 'post'],
            ];
        }
    }

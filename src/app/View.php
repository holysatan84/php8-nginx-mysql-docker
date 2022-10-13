<?php

namespace App;

use App\Exception\ViewNotFoundException;

class View
{
    public function __construct(private string $view, private array $params = [])
    {
    }

    public static function make(string $view, array $params = []): static
    {
        return new static($view, $params);

    }

    public function render(): string
    {
        $viewPath = VIEW_PATH . $this->view . '.php';

        if(!file_exists($viewPath)) {
            throw new ViewNotFoundException();
        }

        foreach($this->params as $param => $value) {
            $$param = $value;
        }
        ob_start();
        include $viewPath;

        return ob_get_clean();
    }

    /**
     * @throws ViewNotFoundException
     */
    public function __toString(): string
    {
        return $this->render();
    }

    public function __get(string $name)
    {
        return $this->params[$name] ?? null;
    }
}
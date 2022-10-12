<?php

namespace App;

class InvoiceCollection implements \Iterator
{

    public function __construct(public array $invoice)
    {
    }

    public function current(): mixed
    {
        echo __METHOD__ . PHP_EOL;
        return current($this->invoice);
    }

    public function next()
    {
        echo __METHOD__ . PHP_EOL;
        return next($this->invoice);
    }

    public function key(): mixed
    {
        echo __METHOD__ . PHP_EOL;
        return key($this->invoice);
    }

    public function valid(): bool
    {
        echo __METHOD__ . PHP_EOL;
        return current($this->invoice) !== false;
    }

    public function rewind(): void
    {
        echo __METHOD__ . PHP_EOL;
        reset($this->invoice);
    }
}
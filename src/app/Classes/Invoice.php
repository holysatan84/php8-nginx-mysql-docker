<?php

namespace App\Classes;

class Invoice
{
    public function index(): string
    {
        return "Invoice";
    }

    public function create(): string
    {
        return "<form action='/invoices/create' method='post'><input type='text' name='invoice'></form>";
    }

    public function store(): void
    {
        var_dump($_POST);
    }
}
<?php

namespace App;

class Invoice
{
    private string $id;
    private string $amount;
    private string $description;
    private string $cardnumber;

    public function __construct() {
        $this->id = uniqid("invoice_");
        $this->amount = "100";
        $this->description = "Some Desc";
        $this->cardnumber = "1234567890";
    }

    public function __sleep(): array
    {
        return  ['id', 'amount'];
    }
    
    public function __serialize(): array
    {
        return  [
            'id' => $this->id, 
            'description' => $this->description,
            'cardnumber' => base64_encode($this->cardnumber)
        ];
    }
    
    public function __unserialize(array $array): void
    {
        var_dump([$array['id'], $array['description']]);
    }
}
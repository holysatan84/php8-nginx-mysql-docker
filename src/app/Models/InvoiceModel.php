<?php

namespace App\Models;

class InvoiceModel extends BaseModel
{

    public function create(float $amount, int $userId)
    {
        $newInvoiceStmt = $this->db->prepare('INSERT INTO invoices (amount, user_id)
                VALUES (?, ?)');

        $newInvoiceStmt->execute([$amount, $userId]);

        return (int) $this->db->lastInsertId();


    }
}
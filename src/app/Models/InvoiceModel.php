<?php

namespace App\Models;

class InvoiceModel extends BaseModel
{

    public function create(float $amount, int $userId): int
    {
        $newInvoiceStmt = $this->db->prepare('INSERT INTO INVOICES (amount, user_id) VALUES (?, ?)');

        $newInvoiceStmt->execute([$amount, $userId]);

        return (int) $this->db->lastInsertId();


    }
}

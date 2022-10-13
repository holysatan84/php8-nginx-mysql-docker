<?php

namespace App\Models;

class User extends BaseModel
{

    public function create(string $email, string $name, bool $isActive = true): int
    {
        $newUserStmt = $this->db->prepare(
            'INSERT INTO USERS (email, full_name, is_active, created_at)
                VALUES(?, ?, 1, now())'
        );
        $newUserStmt->execute([$email, $name]);

        return (int) $this->db->lastInsertId();

    }
}
<?php

namespace App\Controllers;

use App\Models\InvoiceModel;
use App\Models\User;
use App\View;
use App\App;

class HomeController
{
    public function index(): View
    {

        $db = App::db();

        $email = "abwsc@asd.com";
        $name = "John Doe";
        $amount = 25;

        try {
            $db->beginTransaction();

            $userModel = new User();

            $userId = $userModel->create($email, $name, true);

            $invoiceId = new InvoiceModel($amount, $userId);

            $db->commit();
        } catch (\Throwable $e) {

            if($db->inTransaction()) {
                $db->rollBack();
            }
            throw $e;
        }

        return View::make('index');
    }
}
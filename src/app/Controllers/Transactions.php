<?php

    namespace App\Controllers;

    class Transactions
    {
        static $transactionFilePath;

        public function __construct()
        {
            if (!static::$transactionFilePath) {
                static::$transactionFilePath = $_ENV['TRANSACTIONS_FILE'];
            }

        }

        final public function transactions(): void
        {

            $total = 0.0;
            $expenses = 0.0;
            $income = 0.0;
            $handle = fopen(static::$transactionFilePath, "r");
            $headers = fgetcsv($handle);
            echo "<table><tr>";
            foreach ($headers as $header) {
                echo "<th>".$header."</th>";
            }
            echo "</tr>";
            while ($transaction = fgetcsv($handle)) {
                echo "<tr>";
                echo "<td>";
                echo $transaction[0];
                echo "</td>";
                echo "<td>";
                echo $transaction[1];
                echo "</td>";
                echo "<td>";
                echo $transaction[2];
                echo "</td>";
                echo "<td>";
                echo $transaction[3];
                echo "</td>";
                echo "</tr>";
                $transactionValue = (float)str_replace("$", "", $transaction[3]);
                $income += ($transactionValue >= 0) ? $transactionValue : 0;
                $expenses += ($transactionValue < 0) ? $transactionValue : 0;
                $total += $transactionValue;
            }
            echo "<tr>";
            echo "<td>";
            echo '';
            echo "</td>";
            echo "<td>";
            echo '';
            echo "</td>";
            echo "<td>";
            echo 'Income';
            echo "</td>";
            echo "<td>";
            echo "$".$income;
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>";
            echo '';
            echo "</td>";
            echo "<td>";
            echo '';
            echo "</td>";
            echo "<td>";
            echo 'Expenses';
            echo "</td>";
            echo "<td>";
            echo "$".$expenses;
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>";
            echo '';
            echo "</td>";
            echo "<td>";
            echo '';
            echo "</td>";
            echo "<td>";
            echo 'Total';
            echo "</td>";
            echo "<td>";
            echo "$".$total;
            echo "</td>";
            echo "</tr>";
            echo "</table>";

        }

    }

<?php

declare(strict_types=1);

require_once 'Model.php';

class PaymentMethodModel extends Model
{

    //CREATE OPERATION FOR PAYMENT METHOD

    public function new_payment_method(string $payment_method_name,int $created_by)
    {
        $payment_method_name = self::sanitizeInput($payment_method_name);
        $created_by = self::sanitizeInput($created_by);
        try {
            $query = "INSERT INTO payment_methods ('payment_method_name','created_by') 
            VALUES (:payment_method_name,:created_by);";
            $stmt = parent::connect()->prepare($query);
            $stmt->bindParam(':payment_method_name', $payment_method_name);
            $stmt->bindParam(':created_by', $created_by);
            $stmt->execute();
        } catch (PDOException $e) {
            die('Query Failed: ' . $e->getMessage());
        }
    }


    //READ OPERATION FOR PAYMENT METHOD

    public function read_payment_method()
    {
        try {
            $query = "SELECT * 
            FROM payment_methods ORDER BY payment_method_id DESC";
            $stmt = parent::connect()->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Query Failed: ' . $e->getMessage());
        }
    }


    //UPDATE OPERATION FOR PAYMENT METHOD

    public function update_payment_method(int $payment_method_id, string $payment_method_name, int $updated_by)
    {
        $payment_method_name = self::sanitizeInput($payment_method_name);
        $updated_by = self::sanitizeInput($updated_by);
        try {
            $query = "UPDATE payment_methods
            SET payment_method_name = :payment_method_name
            updated_by = :updated_by,
            updated_at = (NOW())
            WHERE payment_method_id = :payment_method_id;";
            $stmt = parent::connect()->prepare($query);
            $stmt->bindParam(':payment_method_id', $payment_method_id);
            $stmt->bindParam(':payment_method_name', $payment_method_name);
            $stmt->bindParam(':updated_by', $updated_by);
            $stmt->execute();
        } catch (PDOException $e) {
            die('Query Failed: ' . $e->getMessage());
        }
    }


    //DELETE OPERATION FOR PAYMENT METHOD

    public function delete_payment_method(int $payment_method_id)
    {
        try {
            $query = "UPDATE payment_methods
            SET is_deleted = 1
            WHERE payment_method_id = :payment_method_id;";
            $stmt = parent::connect()->prepare($query);
            $stmt->bindParam(':payment_method_id', $payment_method_id);
            $stmt->execute();
        } catch (PDOException $e) {
            die('Query Failed: ' . $e->getMessage());
        }
    }
}

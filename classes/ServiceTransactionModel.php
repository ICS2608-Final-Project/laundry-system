<?php

declare(strict_types=1);

require_once 'Model.php';

class ServiceTransactionModel extends Model
{

    //CREATE OPERATION FOR SERVICE TRANSACTION

    public function add_service_transaction(int $service_id, int $transcation_id, int $quantity, float $price)
    {
        $quantity = self::sanitizeInput($quantity);
        $price = self::sanitizeInput($price);
        try {
            $query = "INSERT INTO service_transactions(service_id,transaction_id,quantity,price) 
            VALUES (:service_id,:transaction_id,:quantity,:price);";
            $stmt = parent::connect()->prepare($query);
            $stmt->bindParam(':service_id', $service_id);
            $stmt->bindParam(':transaction_id', $transcation_id);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->bindParam(':price', $price);
            $stmt->execute();
        } catch (PDOException $e) {
            die('Query Failed: ' . $e->getMessage());
        }
    }

    //READ OPERATION FOR SERVICE TRANSACTION
    public function fetch_service_transaction(int $transcation_id) {
        $transcation_id = self::sanitizeInput($transcation_id);
        try {
            $query = "SELECT * 
            FROM service_transactions
            WHERE transaction_id = :transaction_id";
            $stmt = parent::connect()->prepare($query);
            $stmt->bindParam(':transaction_id', $transcation_id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Query Failed: ' . $e->getMessage());
        }
    }

    public function fetch_all_service_transaction()
    {
        try {
            $query = "SELECT * 
            FROM service_transactions ORDER BY service_transaction_id DESC";
            $stmt = parent::connect()->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Query Failed: ' . $e->getMessage());
        }
    }

    //UPDATE OPERATION FOR SERVICE TRANSACTION

    public function update_service_transaction(int $service_transaction_id, int $quantity, float $price)
    {
        $quantity = self::sanitizeInput($quantity);
        $price = self::sanitizeInput($price);
        
        try {
            $query = "UPDATE service_transactions
            SET quantity = :quantity,
            price = :price
            WHERE service_transaction_id = :service_transaction_id;";
            $stmt = parent::connect()->prepare($query);
            $stmt->bindParam(':payment_method_id', $service_transaction_id);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->bindParam(':price', $price);
            $stmt->execute();
        } catch (PDOException $e) {
            die('Query Failed: ' . $e->getMessage());
        }
    }

     //DELETE OPERATION FOR SERVICE TRANSACTION

     public function delete_service_transaction(int $service_transaction_id)
     {
         try {
             $query = "DELETE FROM service_transactions
             WHERE service_transaction_id = :service_transaction_id;";
             $stmt = parent::connect()->prepare($query);
             $stmt->bindParam(':service_transaction_id', $service_transaction_id);
             $stmt->execute();
         } catch (PDOException $e) {
             die('Query Failed: ' . $e->getMessage());
         }
     }
}

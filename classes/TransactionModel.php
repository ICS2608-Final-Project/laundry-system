<?php  
declare (strict_types=1);

require_once 'Model.php';

class TransactionModel extends Model
{

    //CREATE

    public function add_transaction(int $customer_id, int $payment_method_id, string $transaction_date, string $transaction_status, float $total_price)
    {
        $customer_id = self::sanitizeInput($customer_id);
        $payment_method_id = self::sanitizeInput($payment_method_id);
        $transaction_date = self::sanitizeInput($transaction_date);
        $transaction_status = self::sanitizeInput($transaction_status);
        $total_price = self::sanitizeInput($total_price);
        try {
            $query = "INSERT INTO transactions(customer_id,payment_method_id,transaction_date,transaction_status,total_price) 
            VALUES (:customer_id,:payment_method_id,:transaction_date,:transaction_status,:total_price);";
            $stmt = parent::connect()->prepare($query);
            $stmt->bindParam(':customer_id', $customer_id);
            $stmt->bindParam(':payment_method_id', $payment_method_id);
            $stmt->bindParam(':transaction_date', $transaction_date);
            $stmt->bindParam(':transaction_status', $transaction_status);
            $stmt->bindParam(':total_price', $total_price);
            $stmt->execute();
        } catch (PDOException $e) {
            die('Query Failed: ' . $e->getMessage());
        }
    }

    //READ
    public function fetch_transaction(int $transaction_id) {
        $transaction_id = self::sanitizeInput($transaction_id);
        try {
            $query = "SELECT * 
            FROM transactions
            WHERE transaction_id = :transaction_id";
            $stmt = parent::connect()->prepare($query);
            $stmt->bindParam(':transaction_id', $transaction_id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Query Failed: ' . $e->getMessage());
        }
    }

    public function fetch_all_transactions()
    {
        try {
            $query = "SELECT * 
            FROM transactions ORDER BY transaction_id DESC";
            $stmt = parent::connect()->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Query Failed: ' . $e->getMessage());
        }
    }

    //UPDATE

    public function update_transaction(int $transaction_id, int $customer_id, int $payment_method_id, string $transaction_date, string $transaction_status, float $total_price)
    {
        $transaction_id = self::sanitizeInput($transaction_id);
        $customer_id = self::sanitizeInput($customer_id);
        $payment_method_id = self::sanitizeInput($payment_method_id);
        $transaction_date = self::sanitizeInput($transaction_date);
        $transaction_status = self::sanitizeInput($transaction_status);
        $total_price = self::sanitizeInput($total_price);
        
        try {
            $query = "UPDATE transactions
            SET customer_id = :customer_id,
            payment_method_id = :payment_method_id,
            transaction_date = :transaction_date,
            transaction_status = :transaction_status,
            total_price = :total_price
            WHERE transaction_id = :transaction_id;";
            $stmt = parent::connect()->prepare($query);
            $stmt->bindParam(':transaction_id', $transaction_id);
            $stmt->bindParam(':customer_id', $customer_id);
            $stmt->bindParam(':payment_method_id', $payment_method_id);
            $stmt->bindParam(':transaction_date', $transaction_date);
            $stmt->bindParam(':transaction_status', $transaction_status);
            $stmt->bindParam(':total_price', $total_price);
            $stmt->execute();
        } catch (PDOException $e) {
            die('Query Failed: ' . $e->getMessage());
        }
    }

    //DELETE

    public function delete_transaction(int $transaction_id)
    {
        $transaction_id = self::sanitizeInput($transaction_id);
        
        try {
            $query = "DELETE FROM transactions 
            WHERE transaction_id = :transaction_id;";
            $stmt = parent::connect()->prepare($query);
            $stmt->bindParam(':transaction_id', $transaction_id);
            $stmt->execute();
        } catch (PDOException $e) {
            die('Query Failed: ' . $e->getMessage());
        }
    }
}

?>
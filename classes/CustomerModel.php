<?php
declare(strict_types=1);

require_once 'Model.php';

class CustomerModel extends Model {
    public function add_customer($first_name, $last_name, $mobile_number, $email, $customer_address) {
        $first_name = self::sanitizeInput($first_name);
        $last_name = self::sanitizeInput($last_name);
        $mobile_number = self::sanitizeInput($mobile_number);
        $email = self::sanitizeInput($email);
        $customer_address = self::sanitizeInput($customer_address);
        try {
            $query = "INSERT INTO customers(first_name, last_name, mobile_number, email, customer_address) 
            VALUES (:first_name, :last_name, :mobile_number, :email, :customer_address);";

            $stmt = parent::connect()->prepare($query);
            $stmt->bindParam(':first_name', $first_name);
            $stmt->bindParam(':last_name', $last_name);
            $stmt->bindParam(':mobile_number', $mobile_number);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':customer_address', $customer_address);
            $stmt->execute();
        } catch (PDOException $e) {
            die('Query Failed: ' . $e->getMessage());
        }
    }

    
    public function fetch_customers() {
        try 
        {
            $query = "SELECT * FROM customers WHERE is_deleted = 0 ORDER BY customer_id DESC;";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } 
        catch (PDOException $e) 
        {
            die('Query Failed: ' . $e->getMessage());
        }
    }
    //readUser
    public function readUser(){
        try {
            $query = "SELECT * FROM customer WHERE id = :id";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Query Failed: ' . $e->getMessage());
        }
    }
    //update
    public function updateCustomerUser(int $id){

        try{
            $query = "UPDATE customer 
            SET first_name = :first_name,
                last_name = :last_name,
                mobile_number = :mobile_number,
                email = :email,
                address = :address
            WHERE id = :id";

            $stmt = parent::connect()->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':first_name', $first_name);
            $stmt->bindParam(':last_name', $last_name);
            $stmt->bindParam(':mobile_number', $mobile_number);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':address', $address);
            $stmt->execute();

        }catch(PDOException $e){
            die('Query Failed: ' . $e->getMessage());
        }

    }
    //delete
    public function deleteCustomerUser(int $id){

        try {
            $query = "UPDATE customer
                    SET is_deleted = 1
                    WHERE customer_id = :id";
            $stmt = parent::connect()->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            die('Query Failed: ' . $e->getMessage());
        }
    }
}
?>
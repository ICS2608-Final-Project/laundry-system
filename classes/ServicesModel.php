<?php

declare(strict_types=1);

require_once 'Model.php';

class ServicesModel extends Model
{

    //create
    public function add_service(int $created_by, int $updated_by, string $service_name, string $service_description, float $service_price, string $service_status) {
        $created_by = self::sanitizeInput($created_by);
        $updated_by = self::sanitizeInput($updated_by);
        $service_name = self::sanitizeInput($service_name);
        $service_description = self::sanitizeInput($service_description);
        $service_price = self::sanitizeInput($service_price);
        $service_status = self::sanitizeInput($service_status);
        try {
            $query = "INSERT INTO services 
                      (created_by, updated_by, `service_name`, service_description, service_price, service_status) 
                      VALUES (:created_by, :updated_by, :service_name, :service_description, :service_price, :service_status);";
            $stmt = parent::connect()->prepare($query);
            $stmt->bindParam(':created_by', $created_by);
            $stmt->bindParam(':updated_by', $updated_by);
            $stmt->bindParam(':service_name', $service_name);
            $stmt->bindParam(':service_description', $service_description);
            $stmt->bindParam(':service_price', $service_price);
            $stmt->bindParam(':service_status', $service_status);
            $stmt->execute();
        } catch (PDOException $e) {
            die('Query Failed: ' . $e->getMessage());
        }
    }


    //read

    public function fetch_service($identifier, bool $isServiceName = false) {
        $identifier = self::sanitizeInput($identifier);
        if ($isServiceName) {
            $query = "SELECT * FROM services WHERE service_name LIKE :identifier AND is_deleted = 0;";
        } else {
            $query = "SELECT * FROM services WHERE service_id = :identifier AND is_deleted = 0;";
        }
        try {
            $stmt = parent::connect()->prepare($query);
            $stmt->bindParam(':identifier', $identifier);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Query Failed: ' . $e->getMessage());
        }
    }
    public function fetch_services() {
        try {
            $query = "SELECT * FROM services WHERE is_deleted = 0 ORDER BY service_id DESC";
            $stmt = parent::connect()->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Query Failed: ' . $e->getMessage());
        }
    }


    //update
    public function update_service(int $service_id, int $updated_by, string $name, string $description, float $price, string $status, bool $visible)
    {
        $updated_by = self::sanitizeInput($updated_by);
        $name = self::sanitizeInput($name);
        $description = self::sanitizeInput($description);
        try {
            $query = "UPDATE services
                      SET updated_by = :updated_by,
                          service_name = :name,
                          service_description = :description,
                          service_price = :price,
                          service_status = :status,
                          visible = :visible,
                          updated_at = NOW()
                      WHERE service_id = :service_id;";
            $stmt = parent::connect()->prepare($query);
            $stmt->bindParam(':service_id', $service_id);
            $stmt->bindParam(':updated_by', $updated_by);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':visible', $visible, PDO::PARAM_BOOL);
            $stmt->execute();
        } catch (PDOException $e) {
            die('Query Failed: ' . $e->getMessage());
        }
    }


    //delete
    public function delete_service(int $service_id) {
        try {
            $query = "UPDATE services
                      SET is_deleted = 1
                      WHERE service_id = :service_id;";
            $stmt = parent::connect()->prepare($query);
            $stmt->bindParam(':service_id', $service_id);
            $stmt->execute();
        } catch (PDOException $e) {
            die('Query Failed: ' . $e->getMessage());
        }
    }
}

?>
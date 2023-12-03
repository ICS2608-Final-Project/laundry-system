<?php

declare(strict_types=1);

require_once 'Model.php';

class ServicesModel extends Model
{

    //create

    public function new_service(int $created_by, int $updated_by, string $name, string $description, float $price, string $status, bool $visible)
    {
        $created_by = self::sanitizeInput($created_by);
        $updated_by = self::sanitizeInput($updated_by);
        $name = self::sanitizeInput($name);
        $description = self::sanitizeInput($description);

        try {
            $query = "INSERT INTO services 
                      (created_by, updated_by, name, description, price, status, visible, created_at, updated_at) 
                      VALUES (:created_by, :updated_by, :name, :description, :price, :status, :visible, NOW(), NOW());";
            $stmt = parent::connect()->prepare($query);
            $stmt->bindParam(':created_by', $created_by);
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


    //read

    public function read_services()
    {
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
                          name = :name,
                          description = :description,
                          price = :price,
                          status = :status,
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

    public function delete_service(int $service_id)
    {
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
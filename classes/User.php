<?php
declare(strict_types=1);
require_once 'Model.php';

class User extends Model
{
    // CREATE
    public function create($username, $password)
    {
        try 
        {
            $query = 'INSER INTO users(username, password, deleted) VALUES(:usernamae, :password, :deleted);';
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(':username', $this->sanitizeInput($username));
            $stmt->bindParam(':username', $this->sanitizeInput($password));
            $stmt->execute();
        } 
        catch (PDOException $e) 
        {
            die('Query Failed: ' . $e->getMessage());
        }
    }

    // READ
    public function read(int $id)
    {
        try 
        {
            $query = 'SELECT * FROM :id WHERE "";';
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(':id', $this->sanitizeInput($id));
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } 
        catch (PDOException $e) 
        {
            die('Query Failed: ' . $e->getMessage());
        }
    }

    // UPDATE

    // DELETE
}

<?php
require_once '../core/Dbh.php';
declare(strict_types=1);

class User extends Dbh
{
    private string $username;
    private string $password;
    private bool $deleted;

    public function __construct($_username, $_password)
    {
        $this->username = $_username;
        $this->password = $_password;
        $this->deleted = false;
    }

    // CREATE
    public function create()
    {
        try 
        {
            $query = 'INSER INTO users(username, password, deleted) VALUES(:usernamae, :password, :deleted';
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':password', $this->password);
            $stmt->execute();
        } 
        catch (PDOException $e) 
        {
            die('Query Failed: ' . $e->getMessage());
        }
    }

    // READ
    public function read()
    {
        try 
        {
            $query = 'SELECT * FROM users WHERE ""';
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':password', $this->password);
            $stmt->execute();
        } 
        catch (PDOException $e) 
        {
            die('Query Failed: ' . $e->getMessage());
        }
    }

    // UPDATE

    // DELETE
}

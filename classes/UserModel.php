<?php
declare(strict_types=1);

require_once 'Model.php';

class UserModel extends Model {
    // CREATE
    public function add_new_user(string $username, string $password) {
        $username = self::sanitizeInput($username);
        $user_password = self::hash_password(self::sanitizeInput($password));
        try {
            $query = "INSERT INTO users(username, user_password) VALUES (:username, :user_password);";
            $stmt = parent::connect()->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':user_password', $user_password);
            $stmt->execute();
        } catch (PDOException $e) {
            die('Query Failed: ' . $e->getMessage());
        }
    }
    // READ
    public function get_user(string $username) {
        $username = self::sanitizeInput($username);
        try {
            $query = "SELECT username, user_password FROM users WHERE username = :username AND is_deleted = 0;";
            $stmt = parent::connect()->prepare($query);
            $stmt->bindParam(':username', $username);

            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Query Failed: ' . $e->getMessage());
        }
        
    }

    public function get_users() {
        try {
            $query = "SELECT username, user_password FROM users WHERE is_deleted = 0;";
            $stmt = parent::connect()->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Query Failed: ' . $e->getMessage());
        }
        
    }
    // UPDATE
    public function update_user(string $username) {
    }
    // DELETE

    private static function hash_password(string $password) {
        $options = [
            'cost' => 12
        ];

        return password_hash($password, PASSWORD_BCRYPT, $options);
    }
}
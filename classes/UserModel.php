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
    // UPDATE
    // DELETE

    private static function hash_password(string $password) {
        $options = [
            'cost' => 12
        ];

        return password_hash($password, PASSWORD_BCRYPT, $options);
    }
}
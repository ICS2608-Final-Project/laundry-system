<?php
declare(strict_types=1);

require_once 'Model.php';

class UserModel extends Model {
    // CREATE

    /**
     * Adds a new user to the users entity in the database.
     * 
     * This function is responsible for inserting a new user record into the database,
     * including the provided username and password. It ensures the secure storage of
     * user credentials and manages the necessary database operations for user creation.
     * 
     * 
     * @param string $username The username of the user to be added.
     * @param string $password The password associated with the user account.
     * 
     * @return bool True if the user addition is successful, false otherwise.
     * 
     * @throws DatabaseException If there is an issue with the database operation.
     * 
     */
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

    /**
     * Fetches a user record from the database.
     *
     * This function retrieves a user record from the database based on the provided identifier.
     * It can fetch a user either by username or user_id, depending on the $isUsername parameter.
     * It ensures the secure retrieval of user credentials and handles the necessary database
     * operations for user data retrieval.
     *
     * @param string|int $identifier The username or user_id of the user to fetch.
     * @param bool $isUsername (Optional) Set to true if $identifier is a username (default), false if it's a user_id.
     *
     * @return array|null An associative array containing user properties if the user is found,
     *                    or null if the user is not found.
     *                    Keys include 'username' and 'user_password'.
     *
     * @throws DatabaseException If there is an issue with the database operation.
     */
    public function fetch_user($identifier, bool $isUsername = true) {
        $identifier = self::sanitizeInput($identifier);
        try {
            if ($isUsername) {
                $query = "SELECT username, user_password FROM users WHERE username = :identifier AND is_deleted = 0;";
            } else {
                $query = "SELECT username, user_password FROM users WHERE user_id = :identifier AND is_deleted = 0;";
            }
            $stmt = parent::connect()->prepare($query);
            $stmt->bindParam(':identifier', $identifier);

            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Query Failed: ' . $e->getMessage());
        }
        
    }

    /**
     * Fetches all active user records from the database.
     *
     * This function retrieves all user records from the database where the user is not deleted.
     * It ensures the secure retrieval of user credentials and handles the necessary database
     * operations for fetching user data.
     *
     * @return array An array containing associative arrays for each user.
     *               Each associative array has keys 'username' and 'user_password'.
     * @throws DatabaseException If there is an issue with the database operation.
     *
     */
    public function fetch_users() {
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
    /**
     * Updates a user record in the database.
     *
     * This function modifies an existing user record in the database with the provided user_id.
     * It updates the username, hashed password, and the 'updated_at' timestamp.
     * The function ensures secure input handling, password hashing, and manages the necessary
     * database operations for user data modification.
     *
     * @param int    $id       The user_id of the user to be updated.
     * @param string $username The new username for the user.
     * @param string $password The new password for the user.
     *
     * @throws DatabaseException If there is an issue with the database operation.
     */
    public function update_user(int $id, string $username, string $password) {
        $username = self::sanitizeInput($username);
        $user_password = self::hash_password(self::sanitizeInput($password));
        try {
            $query = "UPDATE users
                    SET username = :username,
                        user_password = :user_password,
                        updated_at = (NOW())
                    WHERE user_id = :id;";
            $stmt = parent::connect()->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':user_password', $user_password);
            $stmt->execute();
        } catch (PDOException $e) {
            die('Query Failed: ' . $e->getMessage());
        }
    }
    // DELETE
    /**
     * Deletes a user record from the database.
     *
     * This function marks a user as deleted in the database by updating the 'is_deleted'
     * column to 1 for the specified user_id. It ensures the secure handling of database
     * operations for user deletion.
     *
     * @param int $id The user_id of the user to be deleted.
     *
     * @throws DatabaseException If there is an issue with the database operation.
     */
    public function delete_user(int $id) {
        try {
            $query = "UPDATE users
                    SET is_deleted = 1
                    WHERE user_id = :id;";
            $stmt = parent::connect()->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            die('Query Failed: ' . $e->getMessage());
        }
    }

    private static function hash_password(string $password) {
        $options = [
            'cost' => 12
        ];
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }
}
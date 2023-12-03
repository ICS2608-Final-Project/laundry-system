<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = sanitizeInput($_POST['username']);
    $password = sanitizeInput($_POST['password']);
    if (empty($username)) {
        echo "username is empty";
    }
    if (empty($password)) {
        echo "password is empty";
    }
}

function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function is_username_empty($username) {
    return empty($username);
}

function is_password_empty($password) {
    return empty($password);
}

function hash_password(string $password) {
    $options = [
        'cost' => 12
    ];
    return password_hash($password, PASSWORD_BCRYPT, $options);
}
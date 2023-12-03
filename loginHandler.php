<?php

declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = sanitizeInput($_POST['username']);
    $password = sanitizeInput($_POST['password']);

    require_once 'config/session.config.php';
    require_once 'classes/UserModel.php';

    $errors = [];

    if (is_username_empty($username)) {
        $errors['username_empty'] = 'Username is empty';
    }

    if (is_password_empty($password)) {
        $errors['password_empty'] = 'Password is empty';
    }

    $user = (new UserModel())->fetch_user($username);

    if (is_username_wrong($user)) {
        $errors['wrong_username'] = 'Wrong Username';
    } else if (is_password_wrong($user, $password)) {
        $errors['wrong_password'] = 'Wrong Password';
    }

    if ($errors) {
        $_SESSION['login_errors'] = $errors;

        header("Location: admin.php");
        die();
    }

    session_regenerate_id(true);

    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $user['user_id'];

    session_id($sessionId);

    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['last_regeneration'] = time();

    header("Location: admin.dashboard.php");
    die();
} else {
    header("Location: admin.php");
    die();
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

function is_username_wrong(bool|array $user) {
    if ($user) {
        return false;
    } else {
        return true;
    }
}

function is_password_wrong(bool|array $user, string $password) {
    if (password_verify($password, $user['user_password'])) {
        return false;
    } else {
        return true;
    }
}

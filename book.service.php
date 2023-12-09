<?php

require_once 'config/session.config.php';

if (!$_SERVER['REQUEST_METHOD'] == 'POST') {
    header("Location: index.php");
    die();
}

$_SESSION['service_id'] = $_POST['service_id'];
header("Location: book.pickup.php");
die();
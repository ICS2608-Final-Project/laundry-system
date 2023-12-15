<?php

require_once 'config/session.config.php';

if (!$_SERVER['REQUEST_METHOD'] == 'POST') {
    header("Location: index.php");
    die();
}

$services = [];

foreach ($_POST as $key => $value) {
    if ($value != 0) {
        $services[$key] = $value;
    }
}

if (empty($services)) {
    header("Location: booking.php");
    die();
}

$_SESSION['service_order'] = $services;
header("Location: book.pickup.php");
die();

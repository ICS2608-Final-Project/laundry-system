<?php

require_once 'config/session.config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: admin.php");
    die();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION['update_id']) {
    require_once 'classes/ServicesModel.php';
    $service_id = $_SESSION['update_id'];
    $service_name = $_POST['service_name'];
    $service_description = $_POST['service_description'];
    $service_price = $_POST['service_price'];
    $service_status = $_POST['service_status'];
    (new ServicesModel())->update_service($service_id, $_SESSION['user_id'], $service_name, $service_description, $service_price, $service_status);
    unset($_SESSION['update_id']);
    header("Location: admin.services.php");
    die();
} else {
    unset($_SESSION['update_id']);
    header("Location: admin.dashboard.php");
    die();
}
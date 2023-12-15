<?php

require_once 'config/session.config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: admin.php");
    die();
}

require_once 'classes/ServicesModel.php';

if (isset($_GET['delete_id'])) {
    $service_id = $_GET['delete_id'];
    (new ServicesModel)->delete_service($service_id);
    unset($_GET['delete_id']);
    header("Location: admin.services.php");
    die();
}

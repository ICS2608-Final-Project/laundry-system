<?php

require_once 'config/session.config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: admin.php");
    die();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION['update_id']) {
    require_once 'classes/PaymentMethodModel.php';
    $payment_method_id = $_SESSION['update_id'];
    $payment_method_name = $_POST['payment_method_name'];
    (new PaymentMethodModel())->update_payment_method($payment_method_id, $payment_method_name, $_SESSION['user_id']);
    unset($_SESSION['update_id']);
    header("Location: admin.paymentmethods.php");
    die();
} else {
    unset($_SESSION['update_id']);
    header("Location: admin.dashboard.php");
    die();
}
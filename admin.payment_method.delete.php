<?php

require_once 'config/session.config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: admin.php");
    die();
}

require_once 'classes/PaymentMethodModel.php';

if (isset($_GET['delete_id'])) {
    $payment_method_id = $_GET['delete_id'];
    (new PaymentMethodModel())->delete_payment_method($payment_method_id);
    unset($_GET['delete_id']);
    header("Location: admin.paymentmethods.php");
    die();
}
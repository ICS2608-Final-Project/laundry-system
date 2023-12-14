<?php 

require_once 'config/session.config.php';

require_once 'classes/CustomerModel.php';
require_once 'classes/PaymentMethodModel.php';
require_once 'classes/CustomerModel.php';
require_once 'classes/TransactionModel.php';
require_once 'classes/ServiceTransactionModel.php';

if ($_SERVER["REQUEST_METHOD"] != 'POST') {
    header("Location: index.php");
    die();
}

$customer_model = new CustomerModel();
$pickup_details = $_SESSION['pickup_details'];

$customer_model->add_customer($pickup_details['first_name'], $pickup_details['last_name'], $pickup_details['mobile_number'], $pickup_details['email'], $pickup_details['address']);

$customer = $customer_model->fetch_customer([$pickup_details['first_name'], $pickup_details['last_name']], true);


?>
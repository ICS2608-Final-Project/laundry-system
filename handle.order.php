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
$orders = $_SESSION['service_order'];

$customer_model->add_customer($pickup_details['first_name'], $pickup_details['last_name'], $pickup_details['mobile_number'], $pickup_details['email'], $pickup_details['address']);

$customer = $customer_model->fetch_customer([$pickup_details['first_name'], $pickup_details['last_name']], true);

$transaction_model = new TransactionModel();

$transaction_model->add_transaction($customer['customer_id'], $pickup_details['payment_method'], "Pending");

$current_transaction = $transaction_model->fetch_all_transactions()[0];

$service_transaction_model = new ServiceTransactionModel();

foreach($orders as $service_id => $amount) {
    $service_transaction_model->add_service_transaction($service_id, $current_transaction['transaction_id'], $amount);
}


unset($_SESSION['pickup_details']);
unset($_SESSION['service_order']);

header("Location: order_success.php");
die();
?>
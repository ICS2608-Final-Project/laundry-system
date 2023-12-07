
<?php

use function PHPSTORM_META\type;

require_once 'config/session.config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: admin.php");
    die();
}

if (isset($_GET['id'])) {
    $current_page = 'orders';
    include_once 'template/admin.header.php';

    require_once 'classes/CustomerModel.php';
    require_once 'classes/TransactionModel.php';
    require_once 'classes/ServiceTransactionModel.php';
    require_once 'classes/ServicesModel.php';

    $customer = new CustomerModel();
    $service_transactions = new ServiceTransactionModel();
    $service = new ServicesModel();
    $transaction = (new TransactionModel())->fetch_transaction($_GET['id']);

    if (empty($transaction)) {
        header("Location: admin.php");
        die();
    }
} else {
    header("Location: admin.php");
    die();
}
?>
<h2>Orders</h2>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Service</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $i = 1;
    foreach($service_transactions->fetch_service_transaction($transaction['transaction_id']) as $service_transaction) {
        $service_id = $service_transaction['service_id'];
        $service_name = $service->fetch_service($service_id);
        if (empty($service_name)) {
            continue;
        }
        echo "<tr>";
        echo "<th scope='row'>". $i++ . "</th>";

        echo "<td>";
        echo $service_name['service_name'];
        echo "</td>";

        echo "<td>";
        echo $service_transaction['quantity'];
        echo "</td>";

        echo "<td>";
        echo $service_transaction['price'];
        echo "</td>";

        echo "</tr>";
    }
    echo $transaction['total_price'];
    ?>
  </tbody>
</table>
<?php include_once 'template/admin.footer.php' ?>
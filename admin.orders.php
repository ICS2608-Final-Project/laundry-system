<?php
require_once 'config/session.config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: admin.php");
    die();
}

$current_page = 'orders';
include_once 'template/admin.header.php';

require_once 'classes/CustomerModel.php';
require_once 'classes/TransactionModel.php';
require_once 'classes/ServiceTransactionModel.php';
require_once 'classes/ServicesModel.php';

$customer = new CustomerModel();
$transactions = new TransactionModel();

?>
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Order #</th>
      <th scope="col">Customer</th>
      <th scope="col">Transaction Status</th>
      <th scope="col">Transaction Date</th>
      <th scope="col">Total Price</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($transactions->fetch_all_transactions() as $transaction_data) {
        echo '<tr>';
        echo "<th scope='row'>" . $transaction_data['transaction_id'] . "</th>";
        echo "<td>". ($customer->fetch_customer($transaction_data['customer_id']))['first_name'] . " " . ($customer->fetch_customer($transaction_data['customer_id']))['last_name']. "</td>";
        echo "<td>" . $transaction_data['transaction_status'] . "</td>";
        echo "<td>" . $transaction_data['transaction_date'] . "</td>";
        echo "<td> ₱ " . $transaction_data['total_price'] . "</td>";
        echo "<td><a href='admin.view_order.php?id=". $transaction_data['transaction_id'] ."' class='btn btn-primary'>View Details</a></td>";
        echo '</tr>';
    }
    ?>
    
  </tbody>
</table>
<?php include_once 'template/admin.footer.php' ?>
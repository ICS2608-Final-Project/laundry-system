<?php

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

  $customer_model = new CustomerModel();
  $service_transactions = new ServiceTransactionModel();
  $service = new ServicesModel();
  $transaction = (new TransactionModel())->fetch_transaction($_GET['id']);

  $customer = $customer_model->fetch_customer($transaction['customer_id']);

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
  <thead class="table-success">
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
    foreach ($service_transactions->fetch_service_transaction($transaction['transaction_id']) as $service_transaction) {
      $service_id = $service_transaction['service_id'];
      $service_name = $service->fetch_service($service_id);
      if (empty($service_name)) {
        continue;
      }
    ?>
      <tr>
        <th scope='row'><?= $i++ ?></th>
        <td>
          <?= $service_name['service_name'] ?>
        </td>
        <td>
          <?= $service_transaction['quantity'] ?>
        </td>
        <td>
          <?= "P " . $service_transaction['price'] ?>
        </td>
      </tr>
      <tr class="table-group-divider">
        <th colspan='3'>Total Price</th>
        <td><?= "P " . $transaction['total_price']; ?></td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>
<table class="table table-sm">
  <thead class="table-success">
    <tr>
      <th scope="col" colspan="2">Booking and Contact Information</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <tr>
      <th scope="row">First Name</th>
      <td><?= $customer['first_name'] ?></td>
    </tr>
    <tr>
      <th scope="row">Last Name</th>
      <td><?= $customer['last_name'] ?></td>
    </tr>
    <tr>
      <th scope="row">Mobile No.</th>
      <td><?= $customer['mobile_number'] ?></td>
    </tr>
    <tr>
      <th scope="row">Email</th>
      <td><?= $customer['email'] ?></td>
    </tr>
    <tr>
      <th scope="row">Booking Address</th>
      <td><?= $customer['customer_address'] ?></td>
    </tr>
  </tbody>
</table>
<form action="handle.order.update.php" method="get">
  <div class="">
    <input type="number" name="id" id="order_id" value=<?= $_GET['id'] ?> class="d-none">
  </div>
    <label for="" class="form-label">Status</label>
    <select name="status" id="status" class="form-select">
      <option value="Pending" <?php if ($transaction['transaction_status'] == 'Pending') echo 'selected' ?>>Pending</option>
      <option value="Unpaid" <?php if ($transaction['transaction_status'] == 'Unpaid') echo 'selected' ?>>Unpaid</option>
      <option value="Confirmed" <?php if ($transaction['transaction_status'] == 'Confirmed') echo 'selected' ?>>Confirmed</option>
      <option value="Paid" <?php if ($transaction['transaction_status'] == 'Paid') echo 'selected' ?>>Paid</option>
      <option value="Cancelled" <?php if ($transaction['transaction_status'] == 'Cancelled') echo 'selected' ?>>Cancelled</option>
      <option value="Completed" <?php if ($transaction['transaction_status'] == 'Completed') echo 'selected' ?>>Completed</option>
      <option value="On Hold" <?php if ($transaction['transaction_status'] == 'On Hold') echo 'selected' ?>>On Hold</option>
      <option value="Processing" <?php if ($transaction['transaction_status'] == 'Processing') echo 'selected' ?>>Processing</option>
      <option value="Refunded" <?php if ($transaction['transaction_status'] == 'Refunded') echo 'selected' ?>>Refunded</option>
      <option value="Review Pending" <?php if ($transaction['transaction_status'] == 'Review Pending') echo 'selected' ?>>Review Pending</option>
    </select>
    <button type="submit" class="btn btn-primary mt-2">Submit</button>
</form>
<?php include_once 'template/admin.footer.php' ?>
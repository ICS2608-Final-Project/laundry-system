<?php

require_once 'config/session.config.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: admin.php");
  die();
}

require_once 'classes/TransactionModel.php';

$transaction_model = new TransactionModel();
$transaction_model->update_transaction_status($_GET['id'], $_GET['status']);

header("Location: admin.view_order.php?id=" . $_GET['id']);
die();
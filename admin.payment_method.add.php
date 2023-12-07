<?php

require_once 'config/session.config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: admin.php");
    die();
}

$current_page = 'home';
include_once 'template/admin.header.php';

require_once 'classes/PaymentMethodModel.php';

$payment_method_model = new PaymentMethodModel();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $payment_method_name = $_POST['payment_method_name'];
    $payment_method_model->add_payment_method($payment_method_name, $_SESSION['user_id'], $_SESSION['user_id']);
    header("Location: admin.paymentmethods.php");
    die();
}
?>
<main class="container">
    <h2>Add a service</h2>
    <div class="container border my-3 p-3">
        <form action="admin.payment_method.add.php" method="post">
            <div class="mb-3">
                <label for="service_name" class="form-label">Payment Method Name</label>
                <input type="text" class="form-control" id="payment_method_name" name="payment_method_name" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</main>
<?php include_once 'template/admin.footer.php' ?>
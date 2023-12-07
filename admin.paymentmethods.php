<?php
require_once 'config/session.config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: admin.php");
    die();
}

$current_page = 'home';
include_once 'template/admin.header.php';

require_once 'classes/UserModel.php';
require_once 'classes/PaymentMethodModel.php';

$payment_model = new PaymentMethodModel();
$payment_methods = $payment_model->fetch_payment_methods();

?>
<main class="container">
    <h2 class="my-2">Payment Methods</h2>
    <a href="admin.payment_method.add.php" class="btn btn-primary my-2">ADD PAYMENT METHOD</a>
    <table class="table my-2">
        <thead class="table-primary">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Payment Method Name</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($payment_methods as $payment_method) {
                echo "<tr>";
                echo "<th scope='row'>" . $payment_method['payment_method_id'] ."</th>";
                echo "<td> <a href='admin.payment_method.view.php?payment_id=". $payment_method['payment_method_id'] ."'> " . $payment_method['payment_method_name'] ."</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</main>

<?php include_once 'template/admin.footer.php' ?>
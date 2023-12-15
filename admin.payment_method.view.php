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

$payment_method_model = new PaymentMethodModel();
$user_model = new UserModel();

if (!isset($_GET['payment_id'])) {
    header("Location: admin.dashboard.php");
    die();
}

$payment_method_id = $_GET['payment_id'];
$_SESSION['update_id'] = $payment_method_id;
unset($_GET['payment_id']);
$payment_method = $payment_method_model->fetch_payment_method($payment_method_id);
?>
<main class="container">
    <div class="container border my-3 p-3">
        <h2>Change Payment Method</h2>
        <?php
        $created_by = $user_model->fetch_user($payment_method['created_by'], false);
        $last_updated_by = $user_model->fetch_user($payment_method['updated_by'], false);
        ?>
        <p>Created by: <?php echo $created_by['username'] ?></p>
        <p>Created at <?php echo $payment_method['created_at'] ?></p>
        <p>Last updated by: <?php echo $last_updated_by['username'] ?></p>
        <p>Last updated <?php echo $payment_method['updated_at'] ?></p>
    </div>
    <div class="container border my-3 p-3">
        <form action="admin.payment_method.update.php" method="post">
            <div class="mb-3">
                <label for="service_name" class="form-label">Payment Method Name</label>
                <input type="text" class="form-control" id="payment_method_name" name="payment_method_name" value="<?php echo $payment_method['payment_method_name'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Change</button>
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                Delete
            </button>

            <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deleteModalLabel">Delete Payment Method</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this payment method
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="admin.payment_method.delete.php?delete_id=<?php echo $payment_method_id ?>" class="btn btn-outline-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
<?php include_once 'template/admin.footer.php' ?>
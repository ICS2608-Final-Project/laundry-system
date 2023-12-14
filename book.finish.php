<?php
$page_title = "Love Hon: Finish Booking";
$current_page = 'booking';
$page_description = "";
require_once 'config/session.config.php';
require_once "template/header.php";
require_once 'classes/ServicesModel.php';
$progress_status = ['pickup', 'review'];
$service_model = new ServicesModel();

$orders = $_SESSION['service_order'];
$pickup_details = $_SESSION['pickup_details'];
$total_price = 0;

print_r($pickup_details)

?>
<main class="booking-section">
    <div class="booking-form">
        <?php 
        require_once 'template/progressbar.component.php';
        ?>
        <table class="booking-table">
            <thead>
                <tr>
                    <th class="th1">Services Ordered</th>
                    <th class="th2">Service Price</th>
                    <th class="th3">Amount</th>
                    <th class="th4">Item Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($orders as $service_id => $amount) {
                    $service = $service_model->fetch_service($service_id);
                    $sub_total = $service['service_price'] * $amount;
                    $total_price += $sub_total;
                ?>
                <tr>
                    <td><?= $service['service_name'] ?></td>
                    <td><?= 'P ' . $service['service_price'] ?></td>
                    <td><?= $amount ?></td>
                    <td><?= 'P ' .  $sub_total ?></td>

                </tr>
                <?php
                }
                ?>
                <tr style="border-top: 1px solid black;">
                    <td colspan="3">Order Total</td>
                    <td><?= 'P '. $total_price ?></td>
                </tr>
            </tbody>
        </table>
        <div class="">
            <p><?= $pickup_details['first_name'] ?></p>
            <p><?= $pickup_details['last_name'] ?></p>
            <p><?= $pickup_details['mobile_number'] ?></p>
            <p><?= $pickup_details['email'] ?></p>
            <p><?= $pickup_details['payment_method'] ?></p>
            <p><?= $pickup_details['address'] ?></p>
        </div>
        <form action="">
            <input type="submit" value="Confirm">
        </form>
    </div>
</main>

<?php require_once 'template/footer.php'; ?>
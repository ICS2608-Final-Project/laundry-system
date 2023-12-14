<?php
$page_title = "Love Hon: Finish Booking";
$current_page = 'booking';
$page_description = "";
require_once 'config/session.config.php';
require_once "template/header.php";
//require_once 'classes/ServicesModel.php';
$progress_status = ['finish'];
//$services = (new ServicesModel())->fetch_services();
?>

<link rel="stylesheet" href="scss/_booking.finish.scss">
<main class="service-container">
    <div class="service-progress">
        <div class="prog-1">
            <img src="assets/pink-choose.svg">
            <p>1. Choose a Service</p>
        </div>
        <div class="prog-2">
            <img src="assets/pink-pickup.svg">
            <p>2. Pickup Details</p>
        </div>
        <div class="prog-3">
            <img src="assets/pink-check.svg">
            <p>3. Finish Booking</p>
        </div>
    </div>
    <table class="booking-table">
        <thead>
            <tr>
                <th class="th1">Service Name</th>
                <th class="th2">Service Price</th>
                <th class="th3">Amount</th>
                <th class="th4">Item Subtotal</th>
            </tr>
        </thead>
        <!--<tbody>
            <?php /*foreach ($services as $service): */ ?>
                <tr>
                    <td><?php /*echo ucwords($service['service_name']); */ ?></td>
                    <td><?php /*echo $service['service_price']; */ ?></td>
                    <td><input type="number" name="quantity" min="1" required></td>
                </tr>
            <?php /*endforeach; */ ?>
        </tbody>-->
    </table>
</main>

<?php require_once 'template/footer.php'; ?>
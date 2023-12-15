<?php

require_once 'config/session.config.php';

$page_title = "Love Hon: Pickup details";
$current_page = 'booking';
$page_description = "";
require_once 'config/session.config.php';
require_once "template/header.php";

$progress_status = ['pickup'];

if (!isset($_SESSION['service_order'])) {
    header("Location: booking.php");
    die();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['pickup_details'] = $_POST;
    header("Location: book.finish.php");
    die();
}

?>
<main class="booking-section">
    <form action="" class="pickup-form" method="post">
        <?php require_once 'template/progressbar.component.php' ?>

        <div class="pickup-inputs">
            <div class="name">
                <h4>Name</h4>
                <div class="name-input">
                    <input type="text" name="first_name" id="first_name" placeholder="First Name" autocomplete="off" required>
                    <input type="text" name="last_name" id="last_name" placeholder="Last Name" autocomplete="off" required>
                </div>
            </div>
            <div class="mobile-input form-input">
                <label for="mobile_number">Mobile No.</label>
                <input type="text" name="mobile_number" id="mobile_number" placeholder="+63 XXX-XXX-XXXX" autocomplete="off" required>
            </div>
            <div class="email-input form-input">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Email" required>
            </div>
            <div class="payment_method-input form-input">
                <select name="payment_method" id="payment_method" required>
                    <option value="" selected disabled>-- Select Payment Method --</option>
                    <?php
                    require_once 'classes/PaymentMethodModel.php';
                    foreach ((new PaymentMethodModel())->fetch_payment_methods() as $payment_method) {
                        echo "<option value='" . $payment_method['payment_method_id'] . "'>" . ucwords($payment_method['payment_method_name']) . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="location-input form-input">
                <textarea name="address" id="" rows="3" placeholder="Enter pickup location"></textarea>
            </div>
            <button type="submit">Continue</button>
        </div>
    </form>
    </script>
</main>
<?php include_once 'template/footer.php' ?>
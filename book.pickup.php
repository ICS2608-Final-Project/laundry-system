<?php

require_once 'config/session.config.php';

$page_title = "Love Hon: Pickup details";
$current_page = 'booking';
$page_description = "";
require_once 'config/session.config.php';
require_once "template/header.php";

$progress_status = ['pickup'];
?>
<main class="booking-section">
    <form action="" class="pickup-form" method="post">
        <div class="name">
            <h4>Name</h4>
            <div class="name-input">
                <input type="text" name="first_name" id="first_name" placeholder="First Name" autocomplete="off" required>
                <input type="text" name="last_name" id="last_name" placeholder="Last Name" autocomplete="off" required>
            </div>
        </div>
        <div class="">
            <label for="mobile_number">Mobile No.</label>
            <input type="text" name="mobile_number" id="mobile_number" placeholder="+63 XXX-XXX-XXXX" autocomplete="off" required>
        </div>
        <div class="">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Email" required>
        </div>
        <div class="">
            <select name="payment_method" id="payment_method" required>
                <option value="" selected disabled>-- Select Payment Method --</option>
                <?php 
                require_once 'classes/PaymentMethodModel.php';
                foreach((new PaymentMethodModel())->fetch_payment_methods() as $payment_method) {
                    echo "<option value='". $payment_method['payment_method_id'] ."'>". ucwords($payment_method['payment_method_name'])."</option>";
                }
                ?>
            </select>
        </div>
        <div class="">
            <textarea name="Pickup and Delivery Address" id="" rows="3" placeholder="Enter pickup location"></textarea>
        </div>
        <button type="submit">Continue</button>
    </form>
    </script>
</main>
<?php include_once 'template/footer.php' ?>

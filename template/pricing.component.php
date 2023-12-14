<?php

class PricingComponent {

    // function render($service_name, $service_price, $inclusions) {
    //     echo '<div class="pricing-card">';
    //     echo '<h3>'. ucwords($service_name) . '</h3>';
    //     echo '<h4 class="service-price">₱'. $service_price . '</h4>';
    //     echo '<a href="#" class="book-button">Book Now</a>';
    //     echo '<span class="thematic-break"> </span>';
    //     echo '<ul>';
    //     foreach($inclusions as $inclusion) {
    //         echo '<li>'. $inclusion .'</li>';
    //     }
    //     echo '</ul>';
    //     echo '</div>';
    // }

    function render($service_name, $service_price, $service_description) {
    ?>
    <div class="pricing-card">
        <div class="top">
            <div class="service-details">
                <h3><?= ucwords($service_name) ?></h3>
                <h4 class="service-price">₱<?= $service_price ?></h4>
            </div>
            <a href="booking.php" class="book-button">Book Now</a>
        </div>
        <p class="service-description"><?php echo $service_description ?></p>
    </div>
    <?php
    }
}
?>
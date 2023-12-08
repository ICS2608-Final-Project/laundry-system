<?php

class PricingComponent {

    function render($service_name, $service_price, $inclusions) {
        echo '<div class="pricing">';
        echo '<h1>'. ucwords($service_name) . '</h1>';
        echo '<h2>₱'. $service_price . '</h2>';
        echo '<a href="#" class="bookbutton">Book Now</a>';
        echo '<hr class="thematic-break">';
        echo '<ul>';
        foreach($inclusions as $inclusion) {
            echo '<li>'. $inclusion .'</li>';
        }
        echo '</ul>';
        echo '</div>';
    }
}

<?php
    $page_title = "Love Hon: Pricing";
    $current_page = 'pricing';
    $page_description = "";
    require_once 'config/session.config.php';
    require_once "template/header.php";
?>
<main>
    <div class="container">
        <div class="intro1">
            <h1 class="discover">Discover Affordable Laundry Solutions</h1>
        </div>
        <div class="intro2">
            <p>At Love Hon, we believe in providing quality laundry services at competitive prices.
                Our transparent pricing ensures that you know exactly what to expect. Take a look at
                our pricing details below and experience the convenience of hassle - free laundry.
            </p>
        </div>
    </div>
    <div class="pricing-cards">
        <div class="pricing-card">
            <h2>Dry Clean Service</h2>
            <h1>₱500 - ₱800*</h1>
            <a href="#" class="btn">Select</a>
            <ul>
                <li>For Barong, Gown, Dress</li>
                <li><i>*Price depends on size</i></li>
            </ul>
        </div>
        <div class="pricing-card">
            <h2>Full Service (8KG)</h2>
            <h1>₱195</h1>
            <a href="#" class="btn">Select</a>
            <div class="divider-line1"></div>
            <ul>
                <li>Wash</li>
                <li>Dry</li>
                <li>Fold</li>
                <li>Detergent and Fabric Conditioner Included</li>
            </ul>
        </div>
        <div class="pricing-card">
            <h2>Full Service (10KG)</h2>
            <h1>₱205</h1>
            <a href="#" class="btn">Select</a>
            <div class="divider-line2"></div>
            <ul>
                <li>Wash</li>
                <li>Dry</li>
                <li>Fold</li>
                <li>Detergent and Fabric Conditioner Included</li>
            </ul>
        </div>
    </div>
</main>
<?php include_once 'template/footer.php' ?>
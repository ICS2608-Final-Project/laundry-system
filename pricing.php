
<?php
    $page_title = "Love Hon: Pricing";
    $current_page = 'pricing';
    $page_description = "";
    require_once 'config/session.config.php';
    require_once "template/header.php";

    require_once 'classes/ServicesModel.php';
    $service = new ServicesModel();
    $services = $service->fetch_services();
?>
<main class="pricing-section">
    <div class="pricing-hero">
        <div class="intro">
            <h2 class="discover">Discover Affordable Laundry Solutions</h2>
        </div>
        <div class="intro">
            <p>At Love Hon, we believe in providing quality laundry services at competitive prices.
                Our transparent pricing ensures that you know exactly what to expect. Take a look at
                our pricing details below and experience the convenience of hassle - free laundry.
            </p>
        </div>
    </div>
    <div class="pricing-cards">
        <?php 
        require_once 'template/pricing.component.php';
        $pricing = new PricingComponent();
        for($i = 0;$i < 3; $i++) {
            $pricing->render($services[$i]['service_name'], $services[$i]['service_price'], $services[$i]['service_description']);
        }
        ?>

    </div>
</main>
<?php include_once 'template/footer.php' ?>
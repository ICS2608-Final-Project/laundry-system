<?php
    $page_title = "Home Page";
    $current_page = 'home';
    $page_description = "";
    require_once "template/header.php";
?>
<div class="pricing-container">
    <?php
    require_once 'template/pricing.component.php';
    $pricing_card = new PricingComponent();
    $pricing_card->render('Hand Wash', 100, ['hugs', 'kamay', 'paa']);
    $pricing_card->render('Hand Wash', 100, ['hugs', 'kamay', 'paa']);
    $pricing_card->render('Hand Wash', 100, ['hugs', 'kamay', 'paa']);
    ?>
</div>

<?php include_once 'template/footer.php' ?>
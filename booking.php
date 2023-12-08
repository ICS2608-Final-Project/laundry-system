<?php
    $page_title = "Love Hon: Choose a service";
    $current_page = 'booking';
    $page_description = "";
    require_once 'config/session.config.php';
    require_once "template/header.php";
    require_once 'classes/ServicesModel.php';
    $progress_status = [];
?>
<main class="booking-section">
    <form action="">
        <div class="">
            <?php require_once 'template/progressbar.component.php'; ?>
        </div>
    </form>
</main>
<?php include_once 'template/footer.php' ?>
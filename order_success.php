<?php
$page_title = "Love Hon: Order Success";
$current_page = 'success';
$page_description = "";
require_once 'config/session.config.php';
require_once "template/header.php";
?>
<main class="order-success">
    <div class="order-success-container">
        <div class="title">
            <div class="progress-badge active">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                    <path fill="currentColor" d="m10.6 13.8l-2.15-2.15q-.275-.275-.7-.275t-.7.275q-.275.275-.275.7t.275.7L9.9 15.9q.3.3.7.3t.7-.3l5.65-5.65q.275-.275.275-.7t-.275-.7q-.275-.275-.7-.275t-.7.275L10.6 13.8ZM12 22q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Zm0-2q3.35 0 5.675-2.325T20 12q0-3.35-2.325-5.675T12 4Q8.65 4 6.325 6.325T4 12q0 3.35 2.325 5.675T12 20Zm0-8Z" />
                </svg>
            </div>
            <h2>Order Success</h2>
        </div>
        <div class="description">
            <p>Your order placement is successful</p>
        </div>
        <div class="button-section">
            <a href="index.php" class="button">
                Back
            </a>
        </div>
    </div>
</main>
<?php include_once 'template/footer.php' ?>
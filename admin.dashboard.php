<?php

require_once 'config/session.config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: admin.php");
    die();
}

$current_page = 'home';
include_once 'template/admin.header.php';
?>
<main class="container">
    <table class="table">
        <thead>
            <tr class="table-success">
                <th scope="col" colspan="2">Catalog</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope='row'>
                    <a href="admin.services.php" class="link-primary link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Services</a>
                </th>
                <td class="col">
                    <a href="admin.service.add.php" class="link-primary link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">
                        <i class="bi bi-plus-circle"></i>
                        <span>Add</span>
                    </a>
                </td>
            </tr>
            <tr>
                <th scope='row'>
                    <a href="admin.paymentmethods.php" class="link-primary link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Payment Method</a>
                </th>
                <td class="col">
                    <a href="admin.payment_method.add.php" class="link-primary link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">
                        <i class="bi bi-plus-circle"></i>
                        <span>Add</span>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</main>
<?php include_once 'template/admin.footer.php' ?>
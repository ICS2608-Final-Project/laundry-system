<?php
require_once 'config/session.config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: admin.php");
    die();
}

$current_page = 'home';
include_once 'template/admin.header.php';

require_once 'classes/UserModel.php';
require_once 'classes/ServicesModel.php';

$services_model = new ServicesModel();
$services = $services_model->fetch_services();

?>
<main class="container">
    <h2 class="my-2">Services</h2>
    <a href="" class="btn btn-primary my-2">ADD SERVICE</a>
    <table class="table my-2">
        <thead class="table-primary">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Service Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($services as $service) {
                echo "<tr>";
                echo "<th scope='row'>" . $service['service_id'] ."</th>";
                echo "<td> <a href='admin.service.view.php?service_id=". $service['service_id'] ."'> " . $service['service_name'] ."</a></td>";
                echo "<td>" . $service['service_description'] . "</td>";
                echo "<td>" . $service['service_price'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</main>

<?php include_once 'template/admin.footer.php' ?>
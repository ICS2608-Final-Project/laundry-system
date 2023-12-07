<?php

require_once 'config/session.config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: admin.php");
    die();
}

$current_page = 'home';
include_once 'template/admin.header.php';

require_once 'classes/ServicesModel.php';

$service_model = new ServicesModel();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $service_name = $_POST['service_name'];
    $service_description = $_POST['service_description'];
    $service_price = $_POST['service_price'];
    $service_status = $_POST['service_status'];
    $service_model->add_service($_SESSION['user_id'], $_SESSION['user_id'], $service_name, $service_description, $service_price, $service_status);
    header("Location: admin.services.php");
    die();
}
?>
<main class="container">
    <h2>Add a service</h2>
    <div class="container border my-3 p-3">
        <form action="admin.service.add.php" method="post">
            <div class="mb-3">
                <label for="service_name" class="form-label">Service Name</label>
                <input type="text" class="form-control" id="service_name" name="service_name" required>
            </div>
            <div class="mb-3">
                <label for="service_name" class="form-label">Service Description</label>
                <textarea required name="service_description" class="form-control" id="service_description" rows="5"></textarea>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Price</span>
                <span class="input-group-text">₱</span>
                    <input
                        type="text"
                        class="form-control"
                        name="service_price"
                        id="service_price"
                        placeholder="Price"
                        required
                    />
            </div>
            <div class="mb-3">
                <div class="form-check form-check-inline">
                    <input
                        class="form-check-input"
                        type="radio"
                        name="service_status"
                        id="servie_status"
                        value="active"
                        checked
                    />
                    <label class="form-check-label" for="">active</label>
                </div>
                <div class="form-check form-check-inline">
                    <input
                        class="form-check-input"
                        type="radio"
                        name="service_status"
                        id="inactive"
                        value="inactive"
                    />
                    <label class="form-check-label" for="">inactive</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</main>
<?php include_once 'template/admin.footer.php' ?>
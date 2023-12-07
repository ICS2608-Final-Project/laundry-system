
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
$user_model = new UserModel();

if (!isset($_GET['service_id'])) {
    header("Location: admin.dashboard.php");
    die();
}

$service_id = $_GET['service_id'];
$_SESSION['update_id'] = $service_id;
unset($_GET['service_id']);
$service = $services_model->fetch_service($service_id);
?>
<main class="container">
    <div class="container border my-3 p-3">
        <h2>Change Service</h2>
        <?php 
        $created_by = $user_model->fetch_user($service['created_by'], false);
        $last_updated_by = $user_model->fetch_user($service['updated_by'], false);
        ?>
        <p>Created by: <?php echo $created_by['username'] ?></p>
        <p>Created at <?php echo $service['updated_at'] ?></p>
        <p>Last updated by: <?php echo $last_updated_by['username'] ?></p>
        <p>Last updated <?php echo $service['updated_at'] ?></p>
    </div>
    <div class="container border my-3 p-3">
        <form action="admin.service.update.php" method="post">
            <div class="mb-3">
                <label for="service_name" class="form-label">Service Name</label>
                <input type="text" class="form-control" id="service_name" name="service_name" value="<?php echo $service['service_name'] ?>">
            </div>
            <div class="mb-3">
                <label for="service_name" class="form-label">Service Name</label>
                <textarea name="service_description" class="form-control" id="service_description" rows="5"><?php echo $service['service_description'] ?></textarea>
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
                        value="<?php echo $service['service_price'] ?>"
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
                        <?php if ($service['service_status'] == 'active') { echo 'checked'; } ?>
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
                        <?php if ($service['service_status'] == 'inactive') { echo 'checked'; } ?>
                    />
                    <label class="form-check-label" for="">inactive</label>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Change</button>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                Delete
            </button>

            <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteModalLabel">Delete Service</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this service
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="admin.service.delete.php?delete_id=<?php echo $service_id ?>" class="btn btn-outline-danger">Delete</a>
                    </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
<?php include_once 'template/admin.footer.php' ?>
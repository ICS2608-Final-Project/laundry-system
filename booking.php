<?php
    $page_title = "Love Hon: Choose a service";
    $current_page = 'booking';
    $page_description = "";
    require_once 'config/session.config.php';
    require_once "template/header.php";
    require_once 'classes/ServicesModel.php';
    $progress_status = [];
    $services = (new ServicesModel())->fetch_services();
?>
<main class="booking-section">
    <form action="book.service.php" class="booking-form" method="post">
        <div class="">
            <?php require_once 'template/progressbar.component.php'; ?>
        </div>
        <select name="service_id" id="service">
            <option selected disabled>-- Select a Service --</option>
            <?php 
            foreach($services as $service) {
                echo "<option value=". $service['service_id'] . ">" . ucwords($service['service_name']) . "</option>";
            }
            ?>
        </select>
        <div class="service-info">
            <p class="service-price" id="servicePrice"></p>
            <p class="service-description" id="serviceDescription"></p>
        </div>
        <button type="submit">Continue</button>
    </form>
    <script>
        const services = [
            <?php 
            foreach($services as $service) {
                echo "{";
                echo "serviceId: ". $service['service_id'] . ", ";
                echo "serviceName: '". $service['service_name'] . "', ";
                echo "serviceDescription: '". $service['service_description'] . "', ";
                echo "servicePrice: '". $service['service_price'] . "', ";
                echo "},";
            }
            ?>
        ];

        const service = document.getElementById('service');

        service.addEventListener('change', () => {
            services.forEach((serviceInfo) => {
                const servicePrice = document.getElementById('servicePrice');
                const serviceDescription = document.getElementById('serviceDescription');
                if (serviceInfo['serviceId'] == service.value) {
                    servicePrice.innerHTML = "P" +serviceInfo['servicePrice'];
                    serviceDescription.innerHTML = serviceInfo['serviceDescription'];
                }
            });
        });
    </script>
</main>
<?php include_once 'template/footer.php' ?>
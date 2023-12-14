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
        <table>
            <thead>
                <tr>
                    <th>Services</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody id="services-body">
            </tbody>

        </table>
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
        console.log(services);

        const chooseServiceTable = document.getElementById('services-body');

        services.forEach((service) => {
            const newRow = document.createElement('tr');
            const serviceName = document.createElement('td');
            const serviceQuantity = document.createElement('td');
            const servicePrice = document.createElement('td');

            serviceName.innerHTML = service['serviceName'];
            serviceQuantity.appendChild(createQuantitySelect(service['servivceName'], 'quantity'));

            chooseServiceTable.appendChild(newRow);
            newRow.appendChild(serviceName);
            newRow.appendChild(serviceQuantity);
            newRow.appendChild(servicePrice);
        })

        function createQuantitySelect(selectName, selectClass) {
            const select = document.createElement('select');
            select.setAttribute('class', selectClass);
            select.setAttribute('name', selectName);
            for(i = 0; i < 10; i++) {
                const option = document.createElement('option');
                option.innerHTML = i+1;
                select.appendChild(option);
            }
            return select;
        }
    </script>
</main>
<?php include_once 'template/footer.php' ?>
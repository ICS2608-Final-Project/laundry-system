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

        const chooseServiceTable = document.getElementById('services-body');

        services.forEach((service) => {
            const newRow = document.createElement('tr');
            const serviceNameColumn = document.createElement('td');
            const serviceQuantityColumn = document.createElement('td');
            const servicePriceColumn = document.createElement('td');

            const serviceName = document.createElement('h5', { id: 'serviceName' });
            const servicePriceInfo = document.createElement("p", { id: 'servicePrice' });
            const serviceDescription = document.createElement('p', { id: 'serviceDescriptionn' });

            serviceName.innerHTML = service['serviceName'];
            servicePriceInfo.innerHTML = 'P' + service['servicePrice'];
            serviceDescription.innerHTML = service['serviceDescription'];

            serviceNameColumn.appendChild(serviceName);
            serviceNameColumn.appendChild(servicePriceInfo);
            serviceNameColumn.appendChild(serviceDescription);

            const selectQuantity = createQuantitySelect(`${service['serviceId']}`, 'quantity', `quantity_${service['serviceId']}`);


            serviceQuantityColumn.appendChild(selectQuantity);

            const servicePrice = document.createElement('p', { class: 'service-price', id: `price_${service['serviceId']}`});

            servicePrice.innerHTML = 'P0';
            
            servicePriceColumn.appendChild(servicePrice);

            
            selectQuantity.addEventListener('change', () => {
                servicePrice.innerHTML = `P${service['servicePrice'] * selectQuantity.value}`;
            });


            chooseServiceTable.appendChild(newRow);
            newRow.appendChild(serviceNameColumn);
            newRow.appendChild(serviceQuantityColumn);
            newRow.appendChild(servicePriceColumn);

        })

        function createQuantitySelect(selectName, selectClass, selectId) {
            const select = document.createElement('select');
            select.setAttribute('class', selectClass);
            select.setAttribute('name', selectName);
            select.setAttribute('id', selectId);
            for(i = 0; i < 10; i++) {
                const option = document.createElement('option');
                option.innerHTML = i+0;
                select.appendChild(option);
            }
            return select;
        }
    </script>
</main>
<?php include_once 'template/footer.php' ?>
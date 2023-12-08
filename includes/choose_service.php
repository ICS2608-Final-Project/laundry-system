<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="scss/main.scss" />
    <link rel="stylesheet" href="scss/_choose_service.scss" />
    <title><?php $page_title = isset($page_title) ? $page_title : 'Booking';
            echo $page_title ?></title>
</head>

<body>
    <div class="service-container">
        <div class="service-progress">
            <div class="prog-1">
                <img src="assets/service-icon.svg" alt="service">
                <p>1. Choose a Service </p>
            </div>

            <div class="prog-2">
                <img src="assets/deliver-icon.svg" alt="deliver">
                <p>2. Pickup Details </p>
            </div>

            <div class="prog-3">
                <img src="assets/finish-icon.svg" alt="finish">
                <p>3. Finish Booking</p>
            </div>
        </div>
        <div class="text-1">Choose your order below:</div>
        <div class="service-tbl">
            <table>
                <thead>
                    <tr>
                        <th>Service</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr onclick="selectRow(this)">
                        <td class="service-name">Service 1
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas cursus nibh ex.</p>
                        </td>
                        <td>Service Quantity 1</td>
                        <td>Service Price 1</td>
                    </tr>
                    <tr onclick="selectRow(this)">
                        <td class="service-name">Service 2
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas cursus nibh ex.</p>
                        </td>
                        <td>Service Quantity 2</td>
                        <td>Service Price 2</td>
                    </tr>
                    <tr onclick="selectRow(this)">
                        <td class="service-name">Service 3
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas cursus nibh ex.</p>
                        </td>
                        <td>Service Quantity 3</td>
                        <td>Service Price 3</td>
                    </tr>
                    <tr onclick="selectRow(this)">
                        <td class="service-name">Service 4
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas cursus nibh ex.</p>
                        </td>
                        <td>Service Quantity 4</td>
                        <td>Service Price 4</td>
                    </tr>
                    <tr onclick="selectRow(this)">
                        <td class="service-name">Service 5
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas cursus nibh ex.</p>
                        </td>
                        <td>Service Quantity 5</td>
                        <td>Service Price 5</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <button class="next-btn">Next</button>
    </div>
    <script>
        let selectedRow;

        function selectRow(row) {
            if (selectedRow) {
                selectedRow.classList.remove('active');
            }

            row.classList.add('active');
            selectedRow = row;
        }
    </script>
</body>

</html>
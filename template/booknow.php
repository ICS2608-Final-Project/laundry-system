<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="scss/booknow.scss" />
    <link rel="stylesheet" href="scss/_typography.scss" />
    <link rel="stylesheet" href="scss/main.scss" />
    <title><?php $page_title = isset($page_title) ? $page_title : 'Home';
            echo $page_title ?></title>
</head>
    <body>
        <div class="booknow">
            <div class="container">
                <p>Spice up your wardrobe<br />on laundry day</p>
                <button>Book Now</button>
            </div>
        </div>
    </body>
</html>
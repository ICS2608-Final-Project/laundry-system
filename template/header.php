<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/main.css" />
    <title><?php $page_title = isset($page_title) ? $page_title : 'Home'; echo $page_title ?></title>
</head>
    <body>
        <header class="navbar">
            <img src="assets/Logo.svg" alt="Logo" class="navlogo" />
            <nav class="navright">
                <ul class="navlinks">
                    <li><a href="">Home</a></li>
                    <li><a href="">Pricing</a></li>
                    <li><a href="">About Us</a></li>
                </ul>
                <a class="bookbtn" href="">
                    <button>Book Now</button>
                </a>
            </nav>
        </header>
    </body>
</html>
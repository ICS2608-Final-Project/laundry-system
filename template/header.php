<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title><?php $page_title = isset($page_title) ? $page_title : 'Home'; echo $page_title ?></title>
</head>
<body>
    <header class="navigation-header">
        <nav class="navbar">
            <div class="navleft">
                <a href="index.php">
                    <img src="assets/Logo.svg" alt="Logo" class="navlogo" />
                </a>
            </div>
            <a href="javascript:void(0);" class="toggle-button" id="toggle_button">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>
            <ul class="nav-items" id="navItems">
                <li>
                    <a href="index.php" class="<?php if ($current_page == 'home') { echo 'current'; } ?>">Home</a>
                </li>
                <li>
                    <a href="pricing.php" class="<?php if ($current_page == 'pricing') { echo 'current'; } ?>">Pricing</a>
                </li>
                <li>
                    <a href="booking.php" class="book">Book Now</a>
                </li>
            </ul>
        </nav>
    </header>
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
                <a href="">
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
                    <a href="" class="<?php if ($current_page == 'home') { echo 'current'; } ?>">Home</a>
                </li>
                <li>
                    <a href="">Pricing</a>
                </li>
                <li>
                    <a href="">About Us</a>
                </li>
                <li>
                    <a href="" class="book">Book Now</a>
                </li>
            </ul>
        </nav>
    </header>
<?php
$page_title = "Home Page";
$current_page = 'home';
$page_description = "";
require_once 'config/session.config.php';
require_once "template/header.php";
?>
<main>
    <section class="hero-section">
        <div class="hero-container">
            <h2 class="hero-text">Spice up your wardrobe on laundry day</h2>
            <a href="booking.php" class="book-button">Book Now</a>
        </div>
    </section>
    <section class="home-section-2">
        <div class="section-2-left">
            <div class="section-left-container">
                <h3>Reasons to Book with <span>Love Hon</span></h3>
                <p>At <strong>LoveHon</strong>, we take pride in providing top-notch laundry services tailored to meet your needs. With a commitment to excellence and customer satisfaction, we aim to make the chore of laundry hassle-free for you.</p>
            </div>
        </div>
        <div class="section-2-right">
            <div class="section-right-container">
                <h3>How it Works</h3>
                <ol>
                    <li>Schedule Your Laundry Pick-Up</li>
                    <li>Effortless Clothes Pick-Up</li>
                    <li>Expert Cleaning Process</li>
                    <li>Flexible Payment Options</li>
                    <li>Prompt Delivery of Fresh Clothes</li>
                </ol>
            </div>
        </div>
    </section>
    <section class="contact-section">
        <div class="contact-left">
            <div class="contact-left-container">
                <h3>Have a question for us?</h3>
                <p>Have a question, suggestion, or just want to say hello? We'd love to hear from you! Our team is ready to assist.</p>
            </div>

        </div>
        <div class="contact-right">
            <?php
            require_once 'template/contact.form.php';
            ?>
        </div>
    </section>
</main>
<?php include_once 'template/footer.php' ?>
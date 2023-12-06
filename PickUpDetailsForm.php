<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>form</title>
</head>
<body>
    <div class="hero">
        <div class="container-lg">
            <form method="post">
                <div class="namefield">
                    <label for="name" class="name">Name</label><br>
                    <div class="row">
                        <div class="col">
                            <input type="text" name="Firstname" placeholder="  First Name" class="Firstname" style="width:100%;" required >
                        </div>
                        <div class="col">
                            <input type="text" name="Lastname" placeholder="  Last Name" class="Lastname" style="width:100%;" required >
                        </div>
                    </div>
                <div class="mobileField">
                    <label for="mobileNo" class="mobileNo">Mobile No.</label><br>
                    <input type=" text" name="mobileNo" placeholder="   09XX-XXX-XXX" style="width:100%;" required >
                </div>
                <div class="emailField">
                    <label for="email" class="email">Email</label><br>
                    <input type="text" name="email" placeholder="   Email" style="width:100%;" required >
                </div>
                <div class="PaymentField">
                    <label for="paymentMeth" class="paymentMeth">Payment Method</label><br>
                    <select name="PaymentOpt" id="PaymentOpt" style="width:100%;">
                        <option value="option1">   Select Payment Method</option>
                        <option value="option2">   Select Payment Method</option>
                        <option value="option3">   Select Payment Method</option>
                        <option value="option4">   Select Payment Method</option>
                    </select>
                </div>
                <div class="pickupField">
                    <label for="pickup" class="pickup">Pickup and Delivery Address</label><br>
                    <input type="text" name="email" placeholder="   Enter pickup location" style="width:100%;" required >
                </div>
                <button class="btn1" name="btn1" >Next</button>
            </form>
        </div>
    </div>
</body>
</html>
<style>
    <?php include "PickDetailsForm.css"?>
</style>
<?php
    $page_title = "Home Page";
    $page_description = "";
    require_once "template/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    require_once 'classes/UserModel.php';
    $user = new UserModel();
    $user->add_new_user('admin', 'admin');
    ?>
</body>
</html>
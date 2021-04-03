<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen and (min-width: 601px)" href="css/style_large.css"/>
    <link rel="stylesheet" media="screen and (max-width: 600px)" href="css/style_small.css"/>
    <title>ToDo</title>
</head>
<body>


<nav>
    <p> ToDo </p>
    <?php 
    if(!isset($_SESSION["ID_user"])){
       echo '<div>    <a class="align-left" href="signup.php"> Sign up </a>  <a class="align-left" href="login.php"> Login </a></div>';
    }
    else{
        echo '<a class="align-left" href="includes/logout.inc.php"> Logout </a>';
    }
    ?>
</nav>

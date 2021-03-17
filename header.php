<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
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

<div>
    <h1>Welcome back!</h1>
    <p>Let's do something together</p>
</div>

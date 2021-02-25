<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>ToDo</title>
</head>
<body>

<?php //in progress bar
//    include_once 'in_progress.php';
?>


<nav class="navbar bg-light navbar-light">
    <a class="navbar-brand" href="#"> ToDo </a>
    <?php 
    if(!isset($_SESSION["ID_user"])){
       echo '<div>    <a class="align-left" href="signup.php"> Sign up </a>  <a class="align-left" href="login.php"> Login </a></div>';
    }
    else{
        echo '<a class="align-left" href="includes/logout.inc.php"> Log out </a>';
    }
    ?>
</nav>

<div class="jumbotrone px-5">
    <h1 class="display-4">Welcome back!</h1>
    <p class="lead">Let's do something together</p>
</div>

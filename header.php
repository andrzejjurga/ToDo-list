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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <meta name="keywords" content="todo, lista, lista zadań">
    <meta name="description" content="Świetny projekt listy ułatwaijącej wykonanie zadań">
    <title>ToDo</title>
</head>
<body>

<nav id="first">
    <a href="index.php"><p> ToDo </p></a>
    <?php 
    if(!isset($_SESSION["ID_user"])){
        echo '<div>    <a class="log" href="signup.php"> Sign up </a>  <a class="log" href="login.php"> Login </a></div>';
    }
    else{
        echo '<a class="log" href="includes/logout.inc.php"> Logout </a>';
    }
    ?>
    <div id="here" style="display: none"></div>
</nav>
 

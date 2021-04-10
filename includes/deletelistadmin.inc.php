<?php
require 'dbh.inc.php';
require_once 'functions.php';

$ID_list = $_GET["id"];

    require 'dbh.inc.php';
    $sql = "DELETE FROM lists WHERE ID_list = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "i", $ID_list);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location:index.admin.inc.php");
    exit();

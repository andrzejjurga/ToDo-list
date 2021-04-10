<?php
    session_start();
?>

<?php
require 'dbh.inc.php';
require_once 'functions.php';

$ID_task = $_GET["id"];
deletetask($ID_task);

header("location: ../index.php?error=none");
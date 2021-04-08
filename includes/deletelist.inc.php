<?php
    session_start();
?>

<?php
require 'dbh.inc.php';
require_once 'functions.php';

$ID_list = $_GET["id"];
deletelist($ID_list);

header("location: ../index.php?error=none");
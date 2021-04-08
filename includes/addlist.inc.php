<?php
    session_start();
?>
<?php

if(!isset($_POST["submit"])) {
    ?><script>
        window.history.back();
    </script><?php
}

$list_title = $_POST["list_title"];

require 'dbh.inc.php';
require_once 'functions.php';

if(emptyInputList($list_title) !== false){
    header("location: ../index.php?error=emptyListInput");
    exit();
}

if(listExist($list_title) !== false){
    header("location: ../index.php?error=listExist");
    exit();
}

$ID_user = $_SESSION["ID_user"];

addlist($list_title, $ID_user);




header("location: ../index.php?error=none");
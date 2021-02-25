<?php

if(!isset($_POST["submit"])) {
    ?><script>
        window.history.back();
    </script><?php
}

$login = $_POST["login"];
$password = $_POST["password"];

require 'dbh.inc.php';
require_once 'functions.php';

if(emptyInputLogin($login, $password) !== false){
    header("location: ../login.php?error=emptyLoginInput");
    exit();
}

if(loginExist($login, $password) !== false){
    header("location: ../login.php?error=loginMissing");
    exit();
}

loginUser($conn, $login, $password);
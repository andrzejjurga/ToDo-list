<?php

if(!isset($_POST["submit"])) {
    ?><script>
        window.history.back();
    </script><?php
}

$firstname = $_POST["firstname"];
$surname = $_POST["surname"];
$login = $_POST["login"];
$password = $_POST["password"];
$password2 = $_POST["password2"];

require 'dbh.inc.php';
require_once 'functions.php';

if(emptyInputSignup($firstname, $surname, $login, $password, $password2) !== false){
    header("location: ../signup.php?error=emptyinput");
    exit();
}
if(invalidLogin($login) !== false){
    header("location: ../signup.php?error=invalidlogin");
    exit();
}

if(signupLoginExist($login) !== false){
    header("location: ../signup.php?error=loginExist");
    exit();
}

if(invalidPassword($password) !== false){
    header("location: ../signup.php?error=invalidPassword");
    exit();
}

if(passwordMatch($password, $password2) !== false){
    header("location: ../signup.php?error=passwordMatch");
    exit();
}


createUser($conn, $firstname, $surname, $login, $password);

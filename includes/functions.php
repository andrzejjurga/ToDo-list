<?php

function emptyInputSignup($firstname, $surname, $login, $password, $password2){
    return false;
}

function invalidLogin($login){
    return false;
}

function loginExist($login)
{
    return false;
}

function passwordMatch($password, $password2){
    return false;
}

function createUser($conn, $firstname, $surname, $login, $password){
    $sql = "INSERT INTO users (firstname, surname, login, password) VALUES(?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hash = password_hash($password, PASSWORD_DEFAULT); 

    mysqli_stmt_bind_param($stmt, "ssss", $firstname, $surname, $login, $hash);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();

}
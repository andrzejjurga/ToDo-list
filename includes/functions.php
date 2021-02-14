<?php
function emptyInputSignup($firstname, $surname, $login, $password, $password2){
    $empty = false;
    if(empty($firstname))
    $empty = true;
    if(empty($surname))
    $empty = true;
    if(empty($login))
    $empty = true;
    if(empty($password))
    $empty = true;
    if(empty($password2))
    $empty = true;
    return $empty;
}

function invalidLogin($login){
    return false;
}

function loginExist($login)
{
    require 'dbh.inc.php';
    $exist = false;
    $query = mysqli_query($conn, "SELECT login FROM users")
    or
    exit();
    while($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)){
        foreach($arr as $key => $value){
            if($value==$login)
                $exist = true;
        }
    }
    return $exist;
}

function invalidPassword($password){
    $RegEx = '/^(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';
    if(preg_match($RegEx, $password))
        return false;
    else 
        return true;
}

function passwordMatch($password, $password2){
    if($password==$password2)
        return false;
    else
        return true;
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
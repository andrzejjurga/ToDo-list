<?php

//signup functions
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


function signupLoginExist($login)
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

function invalidPassword($password){//curently off
    $RegEx = '/^(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';
    if(preg_match($RegEx, $password))
    return false;
    else 
    return false;
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

//login functions
function emptyInputLogin($login, $password){
    $empty = false;
    if(empty($login))
    $empty = true;
    if(empty($password))
    $empty = true;
    return $empty;
}

function loginExist($login)
{
    require 'dbh.inc.php';
    $exist = true;
    $query = mysqli_query($conn, "SELECT login FROM users")
    or
    exit();
    while($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)){
        foreach($arr as $key => $value){
            if($value==$login)
            $exist = false;
        }
    }
    return $exist;
}

function loginUser($conn, $login, $password)
{
    require 'dbh.inc.php';
    $query = mysqli_query($conn, "SELECT * FROM users WHERE login = \"$login\"")
    or
    exit();
    $pwd = mysqli_fetch_assoc($query);
    $hashedPassword = $pwd['password'];
    $baseLogin = $pwd['login'];
    
    if(password_verify($password, $hashedPassword) === false)
    {
        header('location: ../login.php?error=password');
    }
    else if(password_verify($password, $hashedPassword) === true)
    {
        session_start();
        $_SESSION["ID_user"] = $pwd['ID_user'];
        $_SESSION["user_surname"] = $pwd['surname'];
        $_SESSION["user_firstname"] = $pwd['firstname'];
        if($pwd['admin']!=null)
        {
            header("location: ./index.admin.inc.php?error=none");
            exit();
        }

        header("location: ../index.php?error=none");
    }
}

//listFunctions
function emptyInputList($list_title){
    if(empty($list_title))
        return true;
    else
        return false;
}

function listExist($list_title, $ID_user)
{
    require 'dbh.inc.php';
    $exist = false;
    $query = mysqli_query($conn, "SELECT list_title FROM lists JOIN users ON lists.ID_user=users.ID_user WHERE lists.ID_user=\"$ID_user\"")
    or
    exit();
    while($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)){
        foreach($arr as $key => $value){
            if($value==$list_title)
            $exist = true;
        }
    }
    return $exist;
}

function addlist($list_title, $ID_user)
{
    require 'dbh.inc.php';
    $sql = "INSERT INTO lists (list_title, ID_user) VALUES(?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "si", $list_title, $ID_user);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php?error=none");
    exit();
}

function deletelist($ID_list)
{
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
    header("location: ../index.php?error=none");
    exit();
}

//taskFunctions

function addtask($task_title, $task_info, $ID_list)
{
     require 'dbh.inc.php';
     $sql = "INSERT INTO tasks (title, info, ID_list) VALUES(?, ?, ?);";
     $stmt = mysqli_stmt_init($conn);
     if(!mysqli_stmt_prepare($stmt, $sql)){
         header("location: ../index.php?error=stmtfailed");
         exit();
     }
    
    mysqli_stmt_bind_param($stmt, "ssi", $task_title, $task_info, $ID_list);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php?error=napewno");
    exit();
}

function deletetask($ID_task)
{
    require 'dbh.inc.php';
    $sql = "DELETE FROM tasks WHERE task_id = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "i", $ID_task);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php?error=none");
    exit();
}
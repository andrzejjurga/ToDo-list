<?php
    session_start();
?>
<?php

if(!isset($_POST["submit"])) {
    ?><script>
        window.history.back();
    </script><?php
}
require 'dbh.inc.php';
require_once 'functions.php';

$ID_list = $_POST['ID_list'];
$task_title = $_POST['task_title'];
$task_info = $_POST['task_info'];

if(emptyInputList($task_title) !== false){
    header("location: ../index.php?error=emptyInput");
    exit();
}

addtask($task_title, $task_info, $ID_list);

header("location: ../index.php?error=none");
exit();
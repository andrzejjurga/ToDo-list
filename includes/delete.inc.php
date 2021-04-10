<?php

require './dbh.inc.php';

$ID_user = $_GET['ID_user'];

$del = mysqli_query($conn,"delete from users where ID_user = '$ID_user'"); // delete query

if($del)
{
    mysqli_close($conn); // Close connection
    header("location:index.admin.inc.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>
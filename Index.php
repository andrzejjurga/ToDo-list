<?php
    include_once 'header.php';
?>

<?php 
    if(!isset($_SESSION["ID_user"]))
        echo '<h1>Zaloguj się aby korzystać ze strony</h1>';
    else
        echo '<h1>Witaj '.$_SESSION["user_surname"].'</h1>';
    
?>


<?php
   include_once 'footer.php';
?>

<?php
    include_once 'header.php';
?>

<h2>Log in</h2>
<div class="d-flex justify-content-center">
    <form action="includes/login.inc.php" method="post">
        <input type="text" name="login" placeholder="Login"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <button type="submit" name="submit">Log in</button>
    </form>
</div>

<?php
    if(isset($_GET["error"])){
        if($_GET["error"]=="emptyLoginInput")
            echo "Uzupełnij wszystkie pola";
        elseif ($_GET["error"]=="loginMissing")
            echo "Login nie istnieje";
        elseif ($_GET["error"]=="none")
            echo "Rejestracja przebiegła pomyślnie";
        
    }

?>

<?php
   include_once 'footer.php';
?>

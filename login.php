<?php
    include_once 'header.php';
?>

<div class="form">
    <h2>Log in</h2>
    <form action="includes/login.inc.php" method="post">
        <input type="text" name="login" placeholder="Login"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <button type="submit" name="submit" onclick="">Log in</button>
    </form>
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
</div>


<?php
   include_once 'footer.php';
?>

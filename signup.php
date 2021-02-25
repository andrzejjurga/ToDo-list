<?php
    include_once 'header.php';
?>

<h2>Sign up</h2>
<div class="d-flex justify-content-center">
    <form action="includes/signup.inc.php" method="post">
        <input type="text" name="firstname" placeholder="First name"><br>
        <input type="text" name="surname" placeholder="Surname"><br>
        <input type="text" name="login" placeholder="Login"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="password" name="password2" placeholder="Repeat password"><br>
        <button type="submit" name="submit">Sign up</button>
    </form>
</div>

<?php
    if(isset($_GET["error"])){
        if($_GET["error"]=="emptyinput")
            echo "Uzupełnij wszystkie pola";
        elseif ($_GET["error"]=="invalidlogin")
            echo "Login może składać się tylko z liczb i liter";
        elseif ($_GET["error"]=="loginExist")
            echo "Login jest już zajęty";
        elseif ($_GET["error"]=="invalidPassword")
            echo "Hasło musi mieć między 8 a 20 znaków, posiadać liczbę i dużą litere";  
        elseif ($_GET["error"]=="passwordMatch")
            echo "Hasło nie są identyczne";
        elseif ($_GET["error"]=="none")
            echo "Rejestracja przebiegła pomyślnie";
        
    }

?>

<?php
    include_once 'footer.php';
?>

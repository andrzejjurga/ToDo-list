<?php
    include_once 'header.php';
?>

<div class="form">
<h2>Sign up</h2>
    <form action="includes/signup.inc.php" method="post">
        <label for="firstname">First name</label>
        <input type="text" name="firstname" placeholder="Janusz"><br>
        <label for="surname">Surname</label>
        <input type="text" name="surname" placeholder="Kowalski"><br>
        <label for="login">Login</label>
        <input type="text" name="login" placeholder="yourlogin"><br>
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="strongpassword"><br>
        <label for="password2">Repeat password</label>
        <input type="password" name="password2" placeholder="strongpassword"><br>
        <button type="submit" name="submit">Sign up</button>
    </form>

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
</div>

<?php
    include_once 'footer.php';
?>

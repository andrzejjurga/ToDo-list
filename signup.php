<?php
    include_once 'header.php';
?>

<div class="form">


    <div class="login-box">
        <h2>Sign up</h2>
        <form action="includes/signup.inc.php" method="post">
          <div class="user-box">
            <input type="text" name="firstname" required="">
            <label>First name</label>
          </div>
          <div class="user-box">
            <input type="text" name="surname" required="">
            <label>Surname</label>
          </div>
          <div class="user-box">
            <input type="text" name="login" required="">
            <label>Username</label>
          </div>
          <div class="user-box">
            <input type="password" name="password" required="">
            <label>Password</label>
          </div>
          <div class="user-box">
            <input type="password" name="password2" required="">
            <label>Repeat password</label>
          </div>
          <button type="submit" name="sumbit">
              SIGN UP
          </button>
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
</div>

<?php
    include_once 'footer.php';
?>

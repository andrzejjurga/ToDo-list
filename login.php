<?php
    include_once 'header.php';
?>

<div class="form">


    <div class="login-box">
        <h2>Login</h2>
        <form action="includes/login.inc.php" method="post">
          <div class="user-box">
            <input type="text" name="login" required="">
            <label>Username</label>
          </div>
          <div class="user-box">
            <input type="password" name="password" id="password" required="">
            <label>Password</label>
            <i class="far fa-eye" id="togglePassword"></i>
          </div>
          <button type="submit" name="sumbit">
              LOGIN
          </button>
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
</div>


<?php
   include_once 'footer.php';
?>

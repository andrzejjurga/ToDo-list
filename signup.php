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
   include_once 'footer.php';
?>

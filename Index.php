<?php
    include_once 'header.php';
?>

<?php 
    if(!isset($_SESSION["ID_user"]))
    {
        echo '<h1>Zaloguj się aby korzystać ze strony</h1>';

    }
    else
    {
        echo '<h1>Witaj '.$_SESSION["user_surname"].'</h1>';
        require './includes/dbh.inc.php';
        $ID_user = $_SESSION["ID_user"];
        $exist = true;
        $query = mysqli_query($conn, "SELECT * FROM tasks WHERE ID_user=\"$ID_user\"")
        or
        exit();
        ?>
        <div id="task">
        <?php
        while($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)){
            echo ' <p class="taskTitle">'.$arr["title"].'</h3>';
            echo ' <p>'.$arr["info"].'</p>';
            
            if($arr["checked"]==0)
                echo '<input type="checkbox">';
            else
                echo '<input type="checkbox" checked>';

            echo '<hr>';
            //foreach($arr as $key => $value){
             //   echo $value.'<br>';
           // }
        }
        ?>
        </div>
        <?php
    }
    
?>


<?php
   include_once 'footer.php';
?>

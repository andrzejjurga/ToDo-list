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
        echo '<h1>Witaj '.$_SESSION["user_firstname"].'</h1>';
        require './includes/dbh.inc.php';
        $ID_user = $_SESSION["ID_user"];

         ?>
         <div id="main">
         <div class="lists">
             <div class="newlist">
             <h2>Add new list</h2>
             <form action="includes/addlist.inc.php" method="post">
               <div class="list-box">
                 <input type="text" name="list_title" required="">
                 <label>List title</label>
               </div>
               <button type="submit" name="sumbit">
                   ADD
               </button>
             </form>
            </div>
           </div>
           <?php
        $list_query = mysqli_query($conn, "SELECT * FROM lists WHERE ID_user=\"$ID_user\"")
        or
        exit();
        while($arr = mysqli_fetch_array($list_query, MYSQLI_ASSOC)){
            ?>
            <div class="list">
                <?php    
                    echo '<h2>'.$arr["list_title"].'</h2>';
                    ?>
                <form action="includes/deletelist.inc.php" method="post">
                <a class="delete" href="includes/deletelist.inc.php?id=<?php echo $arr['ID_list']; ?>">X</a>
            </form>
        </div>
        
        <?php
            $ID_list = $arr["ID_list"];
            $tasks_query = mysqli_query($conn, "SELECT * FROM tasks JOIN lists ON tasks.ID_list=lists.ID_list WHERE tasks.ID_list=\"$ID_list\"")
            or
            exit();
            while($tasksArr = mysqli_fetch_array($tasks_query, MYSQLI_ASSOC)){
                ?>
                <div class="task">
                    <h2>
                        <?php echo $tasksArr["title"]; ?>
                    </h2>
                    <?php echo $tasksArr["info"]; ?>
                </div>
                <?php
            }
        }
        ?>
        <?php

         ?>
            
             </div>
             <?php
        // }
        ?>
        </div>
        <?php
    }
    
?>


<?php
   include_once 'footer.php';
?>

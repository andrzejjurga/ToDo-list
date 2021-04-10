<?php
    session_start();
    require './dbh.inc.php';
    $ID_user = $_GET['ID_user'];
?>
    <!DOCTYPE html>
    <html>
    <head>
      <title>ToDo admin</title>
    </head>
    <body>
    
    <h2>User lists</h2>
    
    <table border="2">
      <tr>
        <td>ID</td>
        <td>title</td>
        <td>Delete</td>
      </tr>
    
    <?php

    $records = mysqli_query($conn,"SELECT * FROM lists WHERE ID_user=\"$ID_user\"");
    
    while($data = mysqli_fetch_array($records))
    {
    ?>
      <tr>
        <td><?php echo $data['ID_list']; ?></td>
        <td><?php echo $data['list_title']; ?></td>
        <td><a href="deletelistadmin.inc.php?id=<?php echo $data['ID_list']; ?>">Delete</a></td>
      </tr>	
    <?php
    }
    ?>
    </table>
    
    </body>
    </html>
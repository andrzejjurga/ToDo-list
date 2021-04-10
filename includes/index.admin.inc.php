<?php
    session_start();
    require './dbh.inc.php';
?>
    <!DOCTYPE html>
    <html>
    <head>
      <title>ToDo admin</title>
    </head>
    <body>
    
    <h2>User Details</h2>
    
    <table border="2">
      <tr>
        <td>ID</td>
        <td>Firstname</td>
        <td>Surname</td>
        <td>login</td>
        <td>Show list</td>
        <td>Delete</td>
      </tr>
    
    <?php

    $records = mysqli_query($conn,"SELECT * FROM users"); // fetch data from database
    
    while($data = mysqli_fetch_array($records))
    {
    ?>
      <tr>
        <td><?php echo $data['ID_user']; ?></td>
        <td><?php echo $data['firstname']; ?></td>
        <td><?php echo $data['surname']; ?></td>    
        <td><?php echo $data['login']; ?></td>    
        <td><a href="list.inc.php?ID_user=<?php echo $data['ID_user']; ?>">Show list</a></td>
        <td><a href="delete.inc.php?ID_user=<?php echo $data['ID_user']; ?>">Delete</a></td>
      </tr>	
    <?php
    }
    ?>
    </table>
    
    </body>
    </html>
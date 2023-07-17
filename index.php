<?php
  session_start();
    
  include("connection.php");
  include("function.php");

  $user_data =check_login($conn);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
     
  </head>
  <body>
  <a href="logout.php">logout</a>
  <h1 style="color:black;font-size:100px;">1.HOME </h1>
  <h2>Home</h2>

  <br>


  Hello, <?= $user_data['user_name'];?>
      
  </body>
</html>
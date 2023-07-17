<?php 
  session_start();
  
  include("connection.php");
  include("function.php");

  if($_SERVER['REQUEST_METHOD']=="POST")
  {
          $user_name=$_POST['user_name'];
          $password=$_POST['password'];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {
                
          $query = "select * from users where user_name = '$user_name' limit 1";
            
          $result = mysqli_query($conn, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                $user_data = mysqli_fetch_assoc($result);
            
                if($user_data['password'] === $password)
                {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("location: index.php");
                    die;
                }
            }
            }
                echo"wrong username or password";
                
            }else
            {
            
            echo "please enter a valid details!";
        }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style type="text/css">
    #text{

        height:25px;
        border-radius:5px;
        padding:4px;
        border:soild thin #aaa;
        width:100%;
    }
    
    button{
        padding:10px;
        width:100px;
        color:white;
        background-color:black;
        border:none;
    }

    #box{
       /* background-color:grey; */
       margin:auto;
       width:300px;
       padding:20px;
       margin-left: 22em;
       margin-top: 6rem;

    }
    .bg{
        background-image:url('https://images.unsplash.com/photo-1609854534028-b512f5246abc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8dmlzYWtoYXBhdG5hbXxlbnwwfHwwfHx8MA%3D%3D&w=1000&q=80')
    }
    </style>
</head>
<body class="bg">

    <div id="box">
        <form method="post">
            <div style="font-size:20px;margin:10px;color:white;">login</div>
            <input id="text" type="text" name="user_name"><br><br>
            <input id="text" type="password" name="password"><br><br>
            <button  type="submit" name="login">submit</button>
            <br><br>
            <a href="signup.php">Click to signup</a><br><br>
</form>
</div>
</body>
</html>
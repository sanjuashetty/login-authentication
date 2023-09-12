<?php 
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Welcome page</title>
    <style>
       
         body {
            background-image: url('back.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            
        }
        form {
    background-color: rgba(255, 255, 255, 0.8); 
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    
  }
  .container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    padding: 20px;
            border: none;
}

.form-label {
    font-weight: bold;
}
body {
            color: darkblue;
        }
        .btn-login {
            border-radius: 20px; /* Adjust the value to control the roundness */
        }
    </style>

    </style>
  </head>
  <body>
    <h1 class="text-center  mt-5">Welcome

    <?php
echo $_SESSION['username'];


    ?>
    </h1>
    <div class="container">
        <a href="logout.php" class="btn btn-primary mt-5 btn-login">Logout</a>
    </div>

   
  </body>
</html>
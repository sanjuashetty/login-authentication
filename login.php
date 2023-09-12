<?php 
$login=0;
$invalid=0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "select * from registration where username='$username' AND password='$password'";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die(mysqli_error($con));
    }

    $num = mysqli_num_rows($result);
    if ($num > 0) {
      //  echo "login successful";
      $login=1;
session_start();
$_SESSION['username']=$username ;
header('location:home.php');

    } else {
       // echo "invalid data";
       $invalid=1;
    }

       
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

    <title>Login page</title>
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
.btn-login {
            border-radius: 20px; /* Adjust the value to control the roundness */
        }
</style>
</head>
<body>
<?php
if($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>success </strong> you are successfully loged in.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
?>
<?php
if($invalid){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error </strong> invalid credentials.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
?>





    <div class="container mt-5">
        <form action="login.php" method="post">
            <h1 class="text-center">Login to our website</h1>
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" placeholder="Enter your username" name="username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" placeholder="Enter your Password" name="password">
            </div>
            <button type="submit" class="btn btn-primary w-100 btn-login">Login</button>
        </form>
    </div>
</body>
</html>

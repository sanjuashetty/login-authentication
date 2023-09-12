<?php 
$success=0;
$user=0;






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
       // echo "User already exists";
$user=1;


    } else {
        $sql = "insert into registration (username, password) values ('$username', '$password')";
        $result = mysqli_query($con, $sql);
        if ($result) {
          //  echo "Signup successful";
          $success=1;
          header('location:login.php');
        } else {
            die(mysqli_error($con));
        }
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

    <title>Signup page</title>
    <style>
         #background-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1; /* Place the video behind other content */
        }

         
        form {
    background-color: rgba(255, 255, 255, 0.5); 
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
   
    
            position: relative; 
}

.form-label {
    font-weight: bold;
}
.btn-login {
            border-radius: 20px; /* Adjust the value to control the roundness */
        }
        

</style>
<video autoplay muted loop id="background-video">
        <source src="u.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</head>
<body>
<?php
if($user){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Oh no sorry </strong> user already exist.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
?>

<?php
if($success){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>success </strong> you are successfully signed up.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
?>




    <div class="container my-5 center-container">
    
        <form action="sign.php" method="post">
            <h1 class="text-center"><strong> SIGN UP PAGE</strong></h1>
            
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" placeholder="Enter your username" name="username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" placeholder="Enter your Password" name="password">
            </div>
            <button type="submit" class="btn btn-primary w-100 btn-login">Sign up</button>
        </form>
    </div>
</body>
</html>

<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "youtube";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);


// @include 'config\db.php';
 @include 'htdocs/youtube/config/db.php';
if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = sha1($_POST['password']);
    $select = " SELECT * FROM user_data WHERE email = '$email' && password = '$pass' ";
    $result = mysqli_query($conn, $select);
    if(mysqli_num_rows($result) > 0 ){
        header('location:youtube.php');
    }  
    else {
      $error[] = 'incorrect password or username';
    };      
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <link rel="stylesheet" href="index.css">

</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>Login Yourself</h3>
            <?php
        if(isset($error)){

            foreach($error as $error){
                echo '<span class="error_msg" > '.$error.'</span>';
            };
        };  
        ?>
    <input type="email" name="email" require placeholder="enter your Email">
    <input type="password" name="password" require placeholder="enter your password">
    <input type="submit" name="submit" value=" Login " class="form-btn">
    <p>don't have an account so create on <a href="register.php"> Register Now </a> </p>
    </form>

    </div>
</body>
</html>
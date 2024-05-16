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

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = sha1($_POST['password']);
    $cpass = sha1($_POST['cpassword']);
    $select = " SELECT * FROM user_data WHERE email = '$email' && password = '$pass' ";
    $result = mysqli_query($conn, $select);
    if(mysqli_num_rows($result) > 0 ){
        $error[] = 'user already exist';
    }else{
        if ($pass != $cpass) {
            $error[] = 'password not matched';
        }else {
            $insert = "INSERT INTO user_data (Name, Email, Password) VALUES('$name','$email','$pass')";
            mysqli_query($conn, $insert);
            header('location:login.php');
        };

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
            <h3>Register Yourself</h3>
        <?php
        
        if(isset($error)){

            foreach($error as $error){
                echo '<span class="error_msg" > '.$error.'</span>';
            };

        };  
        ?>
    <input type="text" name="name" require placeholder="enter your Name">
    <input type="email" name="email" require placeholder="enter your Email">
    <input type="password" name="password" require placeholder="enter your password">
    <input type="password" name="cpassword" require placeholder="confirm your password">
    <input type="submit" name="submit" value="register now" class="form-btn">
    <p>Already Have a Account <a href="login.php"> Login Now </a> </p>
    </form>

    </div>
</body>
</html>

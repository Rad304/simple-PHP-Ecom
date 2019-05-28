<?php
include('sessions.php');
include("config.php");
if(isset($_SESSION['userinfo']['id'])){
    header('Location: '."index.php");
}
if(isset($_POST['register'])){
    echo $_POST['email'].' '.$_POST['pwd'];
    $hashedpwd = hash( 'whirlpool', $_POST['pwd']);
    echo $hashedpwd;
    $sql = "INSERT INTO users (email, password) VALUES (?,?)";
    $stmt= $conn->prepare($sql);
    if($stmt->execute([$_POST['email'], $hashedpwd]))
    {
        $message = '<div class="alert alert-success" role="alert">Registration avec success</div>';
        header( "refresh:3;url=login.php" );
    }else{
        $message = '<div class="alert alert-danger" role="alert">Erreur</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
<h1><center>Registration</center></h1>
<div class="container">
    <form action="#" method="POST">
    <?php if(isset($message)) echo $message; ?>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
    </div>
    <div class="form-group">
        <label for="pwd">Password</label>
        <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password" required>
    </div>
    <button type="submit" name="register" class="btn btn-primary">Register</button>
    </form>
</div>


<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script src="./node_modules/popper.js/dist/popper.min.js"></script>
</body>
</html>
<?php
include('sessions.php');
include("config.php");
if(isset($_SESSION['userinfo']['id'])){
    header('Location: '."index.php");
}
else{
    $_SESSION['userinfo'] = array();
}   

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $hashedpwd = hash( 'whirlpool', $pwd);

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->execute([$email]);
    if($stmt->rowCount() > 0){
        $user = $stmt->fetch();
        if($user['password'] == $hashedpwd){
            $_SESSION['userinfo']['id'] = $user['id'];
            $_SESSION['userinfo']['level'] = $user['level'];
            $message = '<div class="alert alert-success" role="alert">identification...</div>';
            header( "refresh:3;url=index.php" );
        }else{
            $message = '<div class="alert alert-danger" role="alert">Mot de passe incorrect!</div>';
        }
    }else{
        $message = '<div class="alert alert-danger" role="alert">Email non trouvé!</div>';
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Identification</title>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
<h1><center>Identification</center></h1>
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
    <button type="submit" name="login" class="btn btn-primary">Sign in</button>
    </form>
</div>


<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script src="./node_modules/popper.js/dist/popper.min.js"></script>    
</body>
</html>
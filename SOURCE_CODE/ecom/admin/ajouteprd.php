<?php
include('../sessions.php');
include("../config.php");
if(!isset($_SESSION['userinfo']['id'])){
    header('Location: '."../index.php");
}else{
    if(!isset($_SESSION['userinfo']['level']) || $_SESSION['userinfo']['level'] != 0)
        header('Location: '."../index.php");
}
if(isset($_POST['ajouter'])){
    $target_dir = "../images/".$_POST['type']."/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $message = '<div class="alert alert-danger" role="alert">Désolé, seulement JPG, JPEG, PNG & GIF.</div>';
        $uploadOk = 0;
    }
    if ($uploadOk == 1){
        move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
    }
    $type = $_POST['type'];
    $reference=$_POST['reference'];
    $designation =$_POST['designation'];
    $prixnormal=$_POST['prixnormal'];
    $prixpromo = $_POST['prixpromo'];
    $photo = basename( $_FILES["photo"]["name"]);
    $sql = "INSERT INTO produits (type, reference,designation,prixnormal,prixpromo,photo) VALUES (?,?,?,?,?,?)";
    $stmt= $conn->prepare($sql);
    if($stmt->execute([$type,$reference,$designation,$prixnormal,$prixpromo,$photo]))
    {
        $message = '<div class="alert alert-success" role="alert">Le nouveau produit a été Ajouté</div>';
        header( "refresh:3;url=index.php" );
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
    <title>Ajouter un nouveau produit</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
<h1><center>Ajouter un produit</center></h1>
<div class="container">
    <form action="#" method="POST" enctype="multipart/form-data">
    <?php if(isset($message)) echo $message; ?>
    <div class="form-group">
        <label for="type">Type</label>
        <input type="text" class="form-control" name="type" id="type" placeholder="Enter le type" required>
    </div>
    <div class="form-group">
        <label for="reference">Reference</label>
        <input type="text" class="form-control" name="reference" id="reference" placeholder="Enter la reference" required>
    </div>
    <div class="form-group">
        <label for="designation">Designation</label>
        <input type="text" class="form-control" name="designation" id="designation" placeholder="Enter la desination" required>
    </div>
    <div class="form-group">
        <label for="prixnormal">Prix Normal</label>
        <input type="text" class="form-control" name="prixnormal" id="prixnormal" placeholder="Enter le prix normal" required>
    </div>
    <div class="form-group">
        <label for="prixpromo">Prix Promo</label>
        <input type="text" class="form-control" name="prixpromo" id="prixpromo" placeholder="Enter le prix promo" required>
    </div>
    <div class="form-group">
    <label for="photo">Photo</label>
    <input type="file" name="photo" id="photo" required>
    </div>
    <button type="submit" name="ajouter" class="btn btn-primary">Ajouter</button>
    </form>
</div>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
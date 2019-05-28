<?php
include('../sessions.php');
include('../config.php');
include('../produits.php');
if(!isset($_SESSION['userinfo']['id'])){
    header('Location: '."../index.php");
}else{
    if(!isset($_SESSION['userinfo']['level']) || $_SESSION['userinfo']['level'] != 0)
        header('Location: '."../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel - Gestion des produits</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
<h1><center>Gestion des produits</center></h1>
<div class="container mt-5">
    <a href="ajouteprd.php" class="btn btn-primary mb-2">Ajouter un nouveau produit</a>
    <br>
    <table class="table table-dark">
        <thead>
            <tr>
            <th scope="col"></th>
            <th scope="col">type</th>
            <th scope="col">Reference</th>
            <th scope="col">Designation</th>
            <th scope="col">PrixNormal</th>
            <th scope="col">PrixPromo</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($produits as $row): ?>
            <tr>
            <td scope="row"><img src="../images/<?= $row['type']?>/<?= $row['photo']?>" height="80" width="80" class="img-fluid"></td>
            <td><?= $row['type']?></td>
            <td><?= $row['reference']?></td>
            <td><?= $row['designation']?></td>
            <td><?= $row['prixnormal']?>DHs</td>
            <td><?= $row['prixpromo']?>DHs</td>
            <td>
            <a href="editprd.php?ref=<?= $row['reference']?>" class="btn btn-success">Edit</a>
            <a href="delprd.php?ref=<?= $row['reference']?>" class="btn btn-danger">Del</a>
            </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script src="./node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>    
</body>
</html>
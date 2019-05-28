<?php 
include('../sessions.php');
include('../config.php');
if(!isset($_SESSION['userinfo']['id'])){
    header('Location: '."../index.php");
}else{
    if(!isset($_SESSION['userinfo']['level']) || $_SESSION['userinfo']['level'] != 0)
        header('Location: '."../index.php");
}
$ref = $_GET['ref'];
if($ref == ''){
    header('Location: '."index.php"); 
}
$stmt = $conn->prepare("DELETE FROM produits WHERE reference = :ref");
$stmt->execute(['ref' => $ref]);
header('Location: '."index.php");
?>
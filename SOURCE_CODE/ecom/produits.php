<?php
if(isset($_GET["type"])){
    $reqtype = $_GET["type"];
}else{
    $reqtype = 'all';
}
    
if($reqtype == "chemise"  || $reqtype == "blouson" || $reqtype == "veston"){
    $stmt = $conn->prepare("SELECT * FROM produits WHERE type = :reqtype");
    $stmt->execute(['reqtype' => $reqtype]);
    $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
}else{
    $stmt = $conn->query("SELECT * FROM produits");
    $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
}
if(isset($produits)){
    //print_r($produits);
    /*foreach ($produits as $row) {
        echo $row['reference']."<br />\n";
    }*/
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panier</title>
</head>
<body>
<div class="container mt-5">
    <table class="table table-dark">
        <thead>
            <tr>
            <th scope="col">Reference</th>
            <th scope="col">Qte</th>
            <th scope="col">Prix/Unite</th>
            <th scope="col">Sous_total</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $elements = $_SESSION['panier'];
        foreach($elements as $key=>$row):
            $stmt = $conn->prepare("SELECT * FROM produits WHERE reference = :ref");
            $stmt->execute(['ref' => $key]);
            $prdrow = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>
                <tr>
                <td scope="row"><?= $key ?></td>
                <td><?= $row ?></td>
                <td>
                <?php if($prdrow['prixpromo'] != 0){
                    echo $prdrow['prixpromo'];
                }  else{
                    echo $prdrow['prixnormal'];
                }?>DHs
                </td>
                <td>
                <?php if($prdrow['prixpromo'] != 0){
                    echo $prdrow['prixpromo'] * $row;
                }else{
                    echo $prdrow['prixnormal'] * $row;
                }
                ?>DHs
                </td>
                </tr>
            <?php
                endforeach;
                ?>
        </tbody>
    </table>
</div>



</body>
</html>
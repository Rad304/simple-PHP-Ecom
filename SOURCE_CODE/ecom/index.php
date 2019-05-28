<?php
include('sessions.php');
include('config.php');
include('produits.php');

if(!isset($_SESSION['panier']))
    $_SESSION['panier'] = array();

if(isset($_POST['ajouter'])){
    //echo 'reference: '.$_POST['ref'].' '.'Qte demandé: '.$_POST['qte'];
    $ref = $_POST['ref'];
    $qte = $_POST['qte'];
    $_SESSION['panier'][$ref]=$qte;
    //print_r($_SESSION['panier']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-commerce</title>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <style>
        #numberinp {
            width: 3em;
        }
    </style>
</head>
<body>
<h1><center>E-commerce</center></h1>
<?php include('includes/nav.php');?>
<div class="container mt-5">
    <div class="row">
    <?php if(isset($produits)):
        foreach($produits as $row):
    ?>
        <div class="col-md-6 col-lg-4 mb-2">
            <div class="card h-100 ">
                <?php ?><img src="./images/<?php echo $row['type']; ?>/<?php echo $row['photo']; ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><center><?php echo $row['designation']; ?></center></h5>
                    <div class="row">
                        <?php if($row['prixpromo'] != 0):?>
                        <div class="col">
                            <del><?php echo $row['prixnormal']; ?>Dh</del>
                        </div>
                        <div class="col">
                            <b><?php echo $row['prixpromo']; ?>DH</b>
                        </div>
                        <?php else:?>
                        <div class="col">
                            
                        </div>
                        <div class="col">
                            <b><?php echo $row['prixnormal']; ?>DH</b>
                        </div>
                        <?php endif;?>
                        <div class="col">
                        <?php echo $row['reference']; ?>
                        </div>
                    </div>
                    <form action="#" method="POST">
                        <div class="form-group">
                        <input type="text" hidden="true" name="ref" value="<?php echo $row['reference'];?>"/>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input id="numberinp" type="number" value="0" name="qte"/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input type="submit" name="ajouter" class="btn btn-sm btn-success" value="Ajouter au panier"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php  endforeach;
    endif;
    ?>
    </div>
</div>
<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script src="./node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<?php include('panier.php'); ?>
</body>
</html>
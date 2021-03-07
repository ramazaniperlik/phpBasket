<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<link href="css\style.css" type="text/css" rel="stylesheet" />
    <title>Sepet</title>
</head>
<body>
<?php 
session_start();
include('update.php');
include('delete.php');
$delete = new delete(); 
/*$update = new update();*/
        $totall = [];  
        $i = 0; 
        $total = 0;
        $totalcount = 0;  
        $reqMethod = $_SERVER['REQUEST_METHOD'];
        if($reqMethod=='GET')
        {
            if (isset($_GET['delete'])=='delete'){ 
                $delete->unsett($_GET['deleteid']);  
                                                     
            }
            else if (isset($_GET['hiddenUpdate'])=='update'){ 
                $update->update($_GET['updateee']);
            }
        }
    ?>
<div class="basket-header">
<h2>Sepetinizdeki Ürünler</h2>
<hr>
</div> 
<?php foreach($_SESSION['basket'] as $data) { ?>
<div class="basket-container">
<b>Ürün İsmi:</b>&nbsp;<?php echo $data['productName']; ?><b>Ürün Fiyatı:</b>&nbsp;<?php echo $data['productPrice'];echo "TRY"; ?>&nbsp; <b>Ürün Adedi:<form action="Basket.php" method="POST"></b>&nbsp;<input type="textfield" name="piece" placeholder="Adet giriniz..." value="<?php echo $data['productCount'];?>">&nbsp;&nbsp;
<input type="hidden" value='update' name='hiddenUpdate'/>
                    		<input type="hidden" name='updateee' value="<?php echo $data['productId']; ?>"/>
<input type="submit" name="" value="Güncelle" class="btn btn-primary">&nbsp;&nbsp;</form>
<form action="Basket.php" method="GET">
<input type="hidden" value="delete" name="delete" /> 
                   		    <input name="deleteid" type="hidden" id="" value="<?php echo $data['productId'];?>" />
<input type="submit" name="delete" value="Sil" class="btn btn-primary"></form>
<?php
							 $totall[$i]=$data['productPrice'] * $data['productCount'];
							 ?>
							 <?php $totalcount = $totalcount + $data['productCount'];?>
							 <?php $total = $total + (float)$totall[$i];?>
                   			 <?php $i++; ?>
</div>
<?php } ?>
<div class="basket-bottom"><b>Genel Toplam:</b><?php echo($total); ?>&nbsp;&nbsp;&nbsp;<b>Toplam Ürün Adedi:</b><?php echo($totalcount); ?></div>
<a href="session_destroy.php" name="delete" value="Sepeti Boşalt" class="btn btn-primary">Sepeti Boşalt</a>

</body>
</html>
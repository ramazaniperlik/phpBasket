<div class='header'>
<h3>Ürün Listesi</h3>
<div class='header-right'>
<a href="Basket.php" type="button" class="btn btn-primary">Sepete Git</a></div>
<hr>
</div>

<div class="product_container">

<?php
session_start();
foreach($products as $product){ ?>
<form action="..\Ecommerce\addbasket.php" method="POST" class="product">
<div class="card" style="width: 18rem;">
  <img src=""/>
  <div class="card-body">
    <h5 class="card-title"><?php echo $product->getName($product->getProductId());?></h5>
    <p class="card-text"><?php echo $product->getPrice(). ' '. $product->getCurrency(); ?></p>
    <input type="hidden" id="custId" name="hidden" value="<?php echo $product->getProductId(); ?>"/>
    <input type="hidden" id="custId" name="count" value="<?php echo $count=1; ?>"/>
    <input type="hidden" id="custId" name="name" value="<?php echo $product->getName($product->getProductId()); ?>"/>
    <input type="hidden" id="custId" name="price" value="<?php echo $product->getPrice($product->getProductId()); ?>"/>
    <input type="hidden" id="custId" name="currency" value="<?php echo $product->getCurrency($product->getProductId()); ?>"/>
    <input type="submit" name="Sepete Ekle" value="Sepete Ekle" class="btn btn-primary"></input>
  </div>
</div>
</form>
<?php } ?> 

<?php
session_start();
class addBasket{
    public function addSession(){
$count = $_SESSION['basket'][$_POST['hidden']]['productCount']; 
$id = $_POST['hidden'];
$name = $_POST['name'];
if($_POST){

    if($_SESSION['basket'][$_POST['hidden']]['productId']===$id){ 
        $count++;                                           

        $productArray = array('productId'=>$_POST['hidden'],'productName'=>$_POST['name'],'productPrice'=>$_POST['price'],
                    'productCount'=>$count,'productCurreny'=>$_POST['currency']); 

    }
    else if(($_SESSION['basket'][$_POST['hidden']]['productId']!==$id)){ 
        $productArray = array('productId'=>$_POST['hidden'],'productName'=>$_POST['name'],'productPrice'=>$_POST['price'],
                        'productCount'=>$count+1,'productCurrency'=>$_POST['currency']); 
        
        }
}
    
    $_SESSION['basket'][$_POST['hidden']]=$productArray;
    header('location:index.php');
}
}
$show=new addBasket();
$show->addSession();


    /*header('location:index.php');*/  
  /*
    public $basket; 
    public $id;
    public $count;
    public function __construct(){
        $this->id=$_POST['hidden'];
        $this->count=$_POST['count'];
    }
    public function addProduct() : array {
        $id = $_POST['hidden'];
        $count=$_POST['count'];
        if (!empty($id)){
          $basket[] = $id;
        if($_POST)
        {
        if($_SESSION['basket'][$_POST['id']]['productID']===$id)
            {
                $count++;
                $productItems = array('productID'=>$_POST['id'],'productName'=>$_POST['name'],'productPrice'=>$_POST['price'],
                    'productCount'=>$count,'productCurrency'=>$_POST['currency']);
            }
            elseif(($_SESSION['basket'][$_POST['id']]['productID']!==$id)){ 
                $productItems = array('productID'=>$_POST['id'],'productName'=>$_POST['name'],'productPrice'=>$_POST['price'],
                                'productCount'=>$count+1,'productCurrency'=>$_POST['currency']); 
        }
       
      }
      $_SESSION['basket'][$_POST['id']]=$productItems; 
        header('location:addbasket.php');
    }
    print_r($_SESSION['basket'][$_POST['id']]);
*/
?>
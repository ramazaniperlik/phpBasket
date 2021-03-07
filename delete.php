<?php
class delete{

    public function unsett($deleteid) 
    {
        unset($_SESSION['basket'][$deleteid]); 
        header('location:Basket.php');
    }
}
?>
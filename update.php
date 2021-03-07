<?php
class update{

 
    public function update($updateid){ 

        $task = $_GET['piece']; 
        $_SESSION['basket'][$updateid]['productCount'] = $task; 
        header('location:Basket.php');
    }



}
?>
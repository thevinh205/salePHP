<?php 
    include("config.php");
    $type = $_POST['type'];
    if($type == 'addProduct') {      
        $productId = $_POST['productId'];
        $count= $_POST['count'];
        session_start();
        if(isset($_SESSION['cart'][$productId])) {
         $qty = $_SESSION['cart'][$productId] + 1;
        }
        else {
         $qty = 1;
        }
        $_SESSION['cart'][$productId]=$qty;
    }
?>
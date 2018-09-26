<?php 
    include("config.php");
    $type = $_POST['type'];
    if($type == 'addProduct') {      
        $productId = $_POST['productId'];
        $count= $_POST['count'];
        session_start();
        if(isset($_SESSION['cart'][$productId])) {
            $qty = $_SESSION['cart'][$productId] + $count;
        }
        else {
         $qty = $count;
        }
        $_SESSION['cart'][$productId]=$qty;
    } else if($type == 'removeProduct') {      
        $productId = $_POST['productId'];
        session_start();
        if(isset($_SESSION['cart'][$productId])) {
          unset($_SESSION['cart'][$productId]);
        }
    }
?>
<?php
    include("../config.php");
    $type = $_POST['type'];
    if($type == 'editProductShop') {
        $shopId = $_POST['shopId'];
        $productId = $_POST['productId'];
        $count = $_POST['count'];
        $sql = "UPDATE shop_party_relationship SET count='".$count."'
		WHERE product_id='".$productId."' and shop_id=$shopId";
		
        if (mysqli_query($con, $sql)) {
            echo "Edit count product successfully";
        } else {
            echo "Error edit: " . $sql . "<br>" . mysqli_error($con);
        }
    } else if($type == 'deleteProductShop') {
        $shopId = $_POST['shopId'];
        $productId = $_POST['productId'];
        $sql = "DELETE FROM shop_party_relationship WHERE product_id='".$productId."' and shop_id=$shopId";
		
        if (mysqli_query($con, $sql)) {
            echo "Delete product in shop successfully";
        } else {
            echo "Error delete product in shop: " . $sql . "<br>" . mysqli_error($con);
        }
    } else if($type == 'addProductToShop') {
        $shopId = $_POST['shopId'];
        $productId = $_POST['productId'];
        $count = $_POST['count'];
        
        $sql="SELECT count FROM shop_party_relationship where shop_id=$shopId and product_id='$productId'";
        $result=mysqli_query($con,$sql);
        $data=mysqli_fetch_assoc($result);
        if($data['count'] != '') {
            $count += $data['count'];
            $sql = "UPDATE shop_party_relationship SET count='".$count."'
		WHERE product_id='".$productId."' and shop_id=$shopId";
		
            if (mysqli_query($con, $sql)) {
                echo "Add product to shop successfully";
            } else {
                echo "Error add product to shop: " . $sql . "<br>" . mysqli_error($con);
            }
        } else {
            $sql = "INSERT INTO shop_party_relationship (shop_id, product_id, type, create_date, count) 
            VALUES ('".$shopId."', '".$productId."', 'product', CURDATE(), '".$count."')";

            if (mysqli_query($con, $sql)) {
                echo "Add new product to shop successfully";
            } else {
                echo "Error add new product to shop: " . $sql . "<br>" . mysqli_error($con);
            }
        }  
    } else if($type == 'createOrder') {
        $shopId = $_POST['shopId'];
        $priceTotal = $_POST['priceTotal'];
        $listProductId = $_POST['listProductId'];
        $pieces = explode(";", $listProductId);
        
        $sql = "INSERT INTO order_header (employee_username, status, total_price, shop_id, create_date) 
        VALUES ('thevinh', 'resolve', $priceTotal, $shopId, NOW())";

        if (mysqli_query($con, $sql)) {
            $last_id = mysqli_insert_id($con);
            for($i=0; $i<count($pieces); $i++) {
                if($pieces[$i] != '') {
                    $piecesProduct = explode(":", $pieces[$i]);
                    $sql = "INSERT INTO order_party_relationship (shop_id, order_id, product_id, count, status, create_date) 
                        VALUES ($shopId, $last_id, '".$piecesProduct[0]."',$piecesProduct[1], 'open', NOW())";
                    if (mysqli_query($con, $sql)) {
                        echo "Create order successful ";
                    } else {
                        echo "Error in create order party: " . $sql . "<br>" . mysqli_error($con);
                    }
                }
            }
        } else {
            echo "Error add new order header: " . $sql . "<br>" . mysqli_error($con);
        }
    } else if($type == 'updateOrder') {
        $orderId = $_POST['orderId'];
        $total_price = $_POST['total'];
        $status = $_POST['status'];
        echo $total_price;
        $sql = "UPDATE order_header SET total_price=$total_price, status='".$status."'
		WHERE id=$orderId";
		
        if (mysqli_query($con, $sql)) {
            echo "Edit order successfully";
        } else {
            echo "Error edit order: " . $sql . "<br>" . mysqli_error($con);
        }
    }
?>


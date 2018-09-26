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
    }else if($type == 'createOrder') {
	session_start();
        $shopId = 1;
        $priceTotal = $_POST['priceTotal'];
        $customer = $_POST['customer'];
        $phoneNumber = $_POST['phoneNumber'];
        $address = $_POST['address'];
        $note = $_POST['note'];
        $statusOrder = 'new';
        $shipmentFee = $_POST['shipmentFee'];
        $email = $_POST['email'];
        
        if(isset($_SESSION['cart'])) {
            $sql = "INSERT INTO order_header (employee_username, total_price, shop_id, create_date, customer_name, phone_number, address, status, note, shipment_fee, email) 
            VALUES ('thevinh', $priceTotal, $shopId, NOW(), '$customer', '$phoneNumber', '$address', '$statusOrder', '$note', '$shipmentFee', '$email')";

            if (mysqli_query($con, $sql)) {
                $last_id = mysqli_insert_id($con);
                foreach($_SESSION['cart'] as $id => $value) { 
                    if($id != '') {
                        $sql = "INSERT INTO order_party_relationship (shop_id, order_id, product_id, count, status, create_date) 
                            VALUES ($shopId, $last_id, '".$id."',$value, 'open', NOW())";
                        if (mysqli_query($con, $sql)) {
                            $sql = "UPDATE shop_party_relationship SET count=(count-$value) WHERE product_id='".$id."' and shop_id=$shopId";
                            if (mysqli_query($con, $sql)) {
                                unset($_SESSION['cart']);
                                echo "Create order successful ";
                            } else {
                                echo "Error in update count product: " . $sql . "<br>" . mysqli_error($con);
                            }
                        } else {
                            echo "Error in create order party: " . $sql . "<br>" . mysqli_error($con);
                        }
                    }
                } 


                for($i=0; $i<count($pieces); $i++) {
                    if($pieces[$i] != '') {
                        $piecesProduct = explode(":", $pieces[$i]);
                        $sql = "INSERT INTO order_party_relationship (shop_id, order_id, product_id, count, status, create_date) 
                            VALUES ($shopId, $last_id, '".$piecesProduct[0]."',$piecesProduct[1], 'open', NOW())";
                        if (mysqli_query($con, $sql)) {
                            $sql = "UPDATE shop_party_relationship SET count=(count-$piecesProduct[1]) WHERE product_id='".$piecesProduct[0]."' and shop_id=$shopId";
                            if (mysqli_query($con, $sql)) {
                                echo "Create order successful ";
                            } else {
                                echo "Error in update count product: " . $sql . "<br>" . mysqli_error($con);
                            }
                        } else {
                            echo "Error in create order party: " . $sql . "<br>" . mysqli_error($con);
                        }
                    }
                }
            } else {
                echo "Error add new order header: " . $sql . "<br>" . mysqli_error($con);
            }
        }
    }
?>
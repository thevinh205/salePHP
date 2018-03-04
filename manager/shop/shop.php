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
	session_start();
        $shopId = $_POST['shopId'];
        $priceTotal = $_POST['priceTotal'];
        $listProductId = $_POST['listProductId'];
        $customer = $_POST['customer'];
        $phoneNumber = $_POST['phoneNumber'];
        $address = $_POST['address'];
		$note = $_POST['note'];
		$statusOrder = $_POST['statusOrder'];
		$shipmentFee = $_POST['shipmentFee'];
        $pieces = explode(";", $listProductId);
	$username = $_SESSION["username"];
        
        $sql = "INSERT INTO order_header (employee_username, total_price, shop_id, create_date, customer_name, phone_number, address, status, note, shipment_fee) 
        VALUES ('$username', $priceTotal, $shopId, NOW(), '$customer', '$phoneNumber', '$address', '$statusOrder', '$note', '$shipmentFee')";

        if (mysqli_query($con, $sql)) {
            $last_id = mysqli_insert_id($con);
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
    } else if($type == 'updateOrder') {
        $orderId = $_POST['orderId'];
        $total_price = $_POST['total'];
        $status = $_POST['status'];
        $statusOld = $_POST['statusOld'];
        $customer = $_POST['customer'];
        $phoneNumber = $_POST['phoneNumber'];
        $shopId = $_POST['shopId'];
        $sql = "UPDATE order_header SET total_price=$total_price, status='".$status."', customer_name='$customer', phone_number='$phoneNumber'
		WHERE id=$orderId";
        
        if (mysqli_query($con, $sql)) {
            if($status == 'cancle' && $status != $statusOld) {
                $sql="SELECT od.product_id, od.count FROM order_party_relationship od where od.order_id=$orderId";
                $result=mysqli_query($con,$sql);
                while($tv_2=mysqli_fetch_array($result)){
                    $sql = "UPDATE shop_party_relationship SET count=(count+$tv_2[count]) WHERE product_id='".$tv_2['product_id']."' and shop_id=$shopId";
                    if (mysqli_query($con, $sql)) {
                            echo "Edit order successful ";
                    } else {
                            echo "Error in update count product: " . $sql . "<br>" . mysqli_error($con);
                    }
                }
            }
        } else {
            echo "Error edit order: " . $sql . "<br>" . mysqli_error($con);
        }
    } else if($type == 'addEmployee') {
        $shopId = $_POST['shopId'];
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];
        $address = $_POST['address'];
        $birthDate = $_POST['birthDate'];
        $identityCard = $_POST['identityCard'];
        $position = $_POST['position'];
        $gender = $_POST['gender'];
        $sql = "INSERT INTO member (username, email, phone_number, name, address, level, state, birthday, create_date, gender, password, role, identity_card) 
        VALUES ('$username', '$email', '$phoneNumber', '$name', '$address', 1, 'open', '$birthDate', NOW(), '$gender', '$password', '$position', '$identityCard')";
        if (mysqli_query($con, $sql)) {
            $last_id = mysqli_insert_id($con);
            $sql = "INSERT INTO shop_party_relationship (shop_id, member_id, type, create_date, position) 
                        VALUES ($shopId, $last_id, 'employee', NOW(), '$position')";
            if (mysqli_query($con, $sql)) {
                echo "Add employee to shop successful ";
            } else {
                echo "Error in add employee to shop: " . $sql . "<br>" . mysqli_error($con);
            }
        } else {
            echo "Error add new employee: " . $sql . "<br>" . mysqli_error($con);
        }
    } else if($type == 'createSpend') {
        session_start();
        $shopId = $_POST['shopId'];
        $content = $_POST['content'];
        $total = $_POST['total'];
        $username = $_SESSION["username"];
        $sql = "INSERT INTO spend (employee, content, total, shop_id, create_date) 
        VALUES ('$username', '$content', $total, $shopId, NOW())";
        if (mysqli_query($con, $sql)) {
            echo "Add new spend successful ";
        } else {
            echo "Error add new spend: " . $sql . "<br>" . mysqli_error($con);
        }
    } else if($type == 'updateSpend') {
        session_start();
        $spendId = $_POST['spendId'];
        $content = $_POST['content'];
        $total = $_POST['total'];
        $sql = "UPDATE spend SET content='$content', total=$total WHERE id=$spendId";
        if (mysqli_query($con, $sql)) {
            echo "Update spend successful ";
        } else {
            echo "Error in update spend: " . $sql . "<br>" . mysqli_error($con);
        }
    }
?>


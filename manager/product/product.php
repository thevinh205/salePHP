<?php 
    include("../config.php");
    $type = $_POST['type'];
    if($type == 'addProduct') {      
        $productId = $_POST['productId'];
        $productName = $_POST['productName'];
        $productType = $_POST['productType'];
        $priceBuy = $_POST['priceBuy'];
        $priceSell = $_POST['priceSell'];
        $description = $_POST['description'];
        $avatar = $_POST['avatar'];
		$typeName = $_POST['typeName'];
		$guarantee = $_POST['guarantee'];
        
        $sql = "INSERT INTO product (id, name, description, avatar, status, category_name, price_buy, price_sell, product_type, create_date, show_web, guarantee) 
		VALUES ('".$productId."', '".$productName."', '".$description."', '".$avatar."', 'open', '".$typeName."', '".$priceBuy."', '".$priceSell."', '".$productType."', CURDATE(), 1, '$guarantee')";
		
		if (mysqli_query($con, $sql)) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}

    } else if($type == 'editProduct') {      
        $productId = $_POST['productId'];
        $productName = $_POST['productName'];
        $productType = $_POST['productType'];
        $priceBuy = $_POST['priceBuy'];
        $priceSell = $_POST['priceSell'];
        $description = $_POST['description'];
        $avatar = $_POST['avatar'];
        $typeName = $_POST['typeName'];
        $showWeb = $_POST['showWeb'];
        $guarantee = $_POST['guarantee'];
        $prom = $_POST['prom'];
        $priceProm = $_POST['priceProm'];
        
        $sql = "UPDATE product SET name='".$productName."', description='".$description."', avatar='".$avatar."', category_name='".$typeName."', price_buy='".$priceBuy."', price_sell='".$priceSell."', show_web=$showWeb, guarantee='$guarantee', product_type='".$productType."', prom=$prom, price_prom='".$priceProm."'
		WHERE id='".$productId."'";
		
		if (mysqli_query($con, $sql)) {
		    echo "Edit product successfully";
		} else {
		    echo "Error edit: " . $sql . "<br>" . mysqli_error($con);
		}

    }else if($type == 'deleteProduct') {      
        $productId = $_POST['productId'];

        $sql = "DELETE FROM product WHERE id='".$productId."'";
		
		if (mysqli_query($con, $sql)) {
		    echo "Delete product successfully";
		} else {
		    echo "Error delete: " . $sql . "<br>" . mysqli_error($con);
		}

    }
	$con->close();
?>
<?php 
	$path = '../resources/img/sanpham/' . $_POST['productId'];
	
	if (!file_exists($path)) {
	    mkdir($path, 0777);
	}
	
    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        move_uploaded_file($_FILES['file']['tmp_name'], $path . '/' . $_POST['fileName']);
    }
?>
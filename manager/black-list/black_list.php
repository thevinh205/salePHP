<?php 
	include("../config.php");
	$type = $_POST['type'];
	if($type == 'add') {
		$nameAdd = $_POST['nameAdd'];
		$phoneNumberAdd = $_POST['phoneNumberAdd'];
		$addressAdd = $_POST['addressAdd'];
		$linkAdd = $_POST['linkAdd'];
		$contentAdd = $_POST['contentAdd'];
		
		$sql = "INSERT INTO black_list (name, phone_number, address, link, content, create_date) 
        VALUES ('$nameAdd', '$phoneNumberAdd', '$addressAdd', '$linkAdd', '$contentAdd', NOW())";

        if (mysqli_query($con, $sql)) {
			echo "Create black list successful ";
		} else {
			echo "Error in create black list: " . $sql . "<br>" . mysqli_error($con);
		}
	} else if($type == 'edit') {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$phoneNumber = $_POST['phoneNumber'];
		$address = $_POST['address'];
		$link = $_POST['link'];
		$content = $_POST['content'];
		
		$sql = "UPDATE black_list SET name='$name',phone_number='$phoneNumber', address='$address', link='$link', content='$content' 
		WHERE id=$id";

        if (mysqli_query($con, $sql)) {
			echo "Edit black list successful ";
		} else {
			echo "Error in edit black list: " . $sql . "<br>" . mysqli_error($con);
		}
	} else if($type == 'delete') {      
        $id = $_POST['id'];

        $sql = "DELETE FROM black_list WHERE id=$id";
		
		if (mysqli_query($con, $sql)) {
		    echo "Delete black list successfully";
		} else {
		    echo "Error delete black list: " . $sql . "<br>" . mysqli_error($con);
		}

    }
?> 
    
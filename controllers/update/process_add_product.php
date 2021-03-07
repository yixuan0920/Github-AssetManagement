<?php
		$name = $_POST["placeses"];

	$url ='../../data/'.$name.'.json';
// print_r($url);

// die();

	$data = file_get_contents($url);
	$products = json_decode($data);

	$modal = htmlspecialchars($_POST['modal']);
	$quantity = htmlspecialchars($_POST['quantity']);


	$img_name =  $_FILES['image']['name'];
	$img_size =  $_FILES['image']['size'];
	$img_tmpname =  $_FILES['image']['tmp_name'];

	$img_type = pathinfo($img_name, PATHINFO_EXTENSION);
	$is_img = false;
	$has_details = false;
	$imagefile = false;

	if( $img_type == 'jpg' || $img_type == 'png' || $img_type == 'gif' || $img_type == 'jpeg' || $img_type == 'svg') {
				$imagefile = true;
	} else {
		echo "Please upload an image file";
	}

	if(strlen($modal) > 0 && intval($quantity) > 0) {
		$has_details = true; 
	}
	

	if($has_details == true && $imagefile == true && $img_size > 0) {
		$product = new stdClass();
		$product->modal = $modal;
		$product->quantity = $quantity;
		$product->image = "/assets/img/" . $img_name;
		$product->isActive = true;
		move_uploaded_file($img_tmpname, '../../assets/img/'. $img_name);

		$products[] = $product;

		file_put_contents($url, json_encode($products, JSON_PRETTY_PRINT));
		header("Location: ../../views/forms/meetingRoom.php");
	}
	else{
		echo "please upload your image";

	}

?>
<?php
	$name = $_POST["placeses"];
	$data = file_get_contents("../../data/".$name.".json");
	// echo var_dump($data);
	// die();
	$items = json_decode($data);
	$id = $_POST['id'];
	
	$url ='../../data/'.$name.'.json';

// print_r($url);

// die();

	$data = file_get_contents($url);

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
	}

	if(strlen($modal) > 0 && intval($quantity) > 0) {
		$has_details = true; 
	}
	
	

	if($has_details == true && $imagefile == true && $img_size > 0) {

		$item = $items[$id]; 
		$item->modal = $modal;
		$item->quantity = $quantity;
		$item->image = "/assets/img/" . $img_name;
		$item->isActive = true;
		move_uploaded_file($img_tmpname, '../../assets/img/'. $img_name);
		// $products[] = $product;

		file_put_contents($url, json_encode($items, JSON_PRETTY_PRINT));
	header('Location: ../../views/forms/'.$name.'.php');

	} else {
		echo "Please upload your correct details";
		echo "<br>";
		echo "<a href='/'>Back to home page</a>";
		die();}

?>
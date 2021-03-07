<?php 
		
		$id = $_GET['id'];
		$data = file_get_contents("../../data/users.json");
		$items = json_decode($data);
		
		

		array_splice($items, $id, 1);

		file_put_contents("../../data/users.json", json_encode($items,JSON_PRETTY_PRINT));

		header('Location: /views/forms/adminuser.php');

?>
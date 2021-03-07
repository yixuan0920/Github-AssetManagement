<?php 
		
		$id = $_GET['id'];
		$placeses = $_GET["places"];
		$data = file_get_contents("../../data/".$placeses.".json");
		$items = json_decode($data);
		
		

		array_splice($items, $id, 1);

		file_put_contents("../../data/".$placeses.".json", json_encode($items,JSON_PRETTY_PRINT));

		header('Location: /views/forms/'.$placeses.'.php');

?>
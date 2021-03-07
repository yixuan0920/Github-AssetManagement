<?php 
	
	$id = $_GET['id'];
	$placeses = $_GET['places'];
	$data = file_get_contents('../../data/'.$placeses.'.json');
	$items = json_decode($data);

	if($items[$id]->isActive) {
		$items[$id]->isActive = false;
	} else {
		$items[$id]->isActive = true;
	}

	file_put_contents('../../data/'.$placeses.'.json', json_encode($items,JSON_PRETTY_PRINT));

	$_SESSION['class'] = $items[$id]->isActive ? 'info' : 'warning' ;
	$_SESSION['message'] = $items[$id]->isActive ? 'Product activated' : 'Product deactivated' ;

	header('Location: /views/forms/'.$placeses.'.php');

?>
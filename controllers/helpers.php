<?php 

function get_users() {
	$data = file_get_contents('../data/users.json');
	$users = json_decode($data);
	return $users;
}

function get_products($url) {
	$data = file_get_contents($url);
	$products = json_decode($data);
	return $products;
}

function get_payments() {
	$data = file_get_contents('../data/payments.json');
	$payments = json_decode($data);
	return $payments;
}

function get_data($url){
	$datas = json_decode(file_get_contents($url));
	return $datas;
}
function get_borrows($url){
	$borrow = json_decode(file_get_contents($url));
	return $borrow;
}
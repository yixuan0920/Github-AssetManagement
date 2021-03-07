<?php
	session_start();
	include "../helpers.php";

	$place = $_GET["places"];
	$url ="../../data/".$place.".json";
	$datas = get_data($url);

	$id = $_GET["id"];
	$quantity = $_GET["quantity"];

	$borrow = get_data("../../data/borrow.json");

	$newData = new stdClass();
	$newData->modal = $datas[$id]->modal;
	$newData->borrower = $_SESSION["user_details"]->username;
	$newData->image = $datas[$id]->image;
	$newData->place = $place;
	$newData->quantity = $quantity;
	$_SESSION["borrow"] = array();

	// array_unshift($_SESSION["borrow"],$newData);
	$_SESSION["borrow"][] = $newData;

	file_put_contents("../../data/booking.json", json_encode($datas,JSON_PRETTY_PRINT));
	header("Location: ".$_SERVER["HTTP_REFERER"]);
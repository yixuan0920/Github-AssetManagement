<?php
	session_start();
	$id = $_GET["id"];

	array_splice($_SESSION["borrow"], $id,1);

	header("Location: ".$_SERVER["HTTP_REFERER"]);
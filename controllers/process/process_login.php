<?php 
    $data = file_get_contents('../../data/person/users.json');
    $users = json_decode($data);

	$username = $_POST['username'];
	$password = $_POST['password'];


	foreach($users as $indiv_user){
	    if($indiv_user->username == $username && password_verify($password, $indiv_user->password)){
	        session_start();
	        $_SESSION['user_details'] = $indiv_user;
	        header("Location: ../../index.php");
	    }
	}

	echo "No user found / wrong credentials";
	echo "<br>";
	echo "<a href='/index.php'> Go to login</a>";

?>

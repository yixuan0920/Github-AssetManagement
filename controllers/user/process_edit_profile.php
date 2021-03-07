<?php 
	session_start();

    include "../helpers.php";

    $url = "../../data/users.json";
    $users = get_data($url);
    $hv_user = false;
    // print_r($users);
    // die();
    $fullname = htmlspecialchars($_POST['fullname']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    
    foreach($users as $i => $user){
        if($_SESSION["user_details"]->username == $user->username){
            $id = $i;
            $hv_user = true;
            break;
        }
    }
    if(!$hv_user){
        echo "User not found";
        die();
    }

    if(strlen($username)<6){
        echo "Username is not available!";
        die();
    }
    if(strlen($password)<6){
        echo "Password could not least then 6!";
        die();
    }

    $users[$id]->fullname = $fullname;
    $users[$id]->username = $username;
    $users[$id]->password = password_hash($password,PASSWORD_DEFAULT);

    $_SESSION["user_details"] = $users[$id];
    
    file_put_contents($url,json_encode($users , JSON_PRETTY_PRINT));
    header("Location: /views/forms/homepage.php");



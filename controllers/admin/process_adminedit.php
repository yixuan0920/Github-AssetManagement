<?php
    session_start();
    include "../helpers.php";

    $url = "../../data/users.json";
    $users = get_data($url);
    $hv_user = false;

    $fullname = htmlspecialchars($_POST['fullname']);
    $username = htmlspecialchars($_POST['username']);
    
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

    $users[$id]->fullname = $fullname;
    $users[$id]->username = $username;
    
    file_put_contents($url,json_encode($users , JSON_PRETTY_PRINT));
    header ("Location: /views/forms/adminuser.php");


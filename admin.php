<?php
    $arr = [
        'ashik' => '123',
        'admin' => 'admin'

    ];

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(array_key_exists($username, $arr) && $arr[$username] == $password){
        echo "Login Successfull";
    }else{
        echo "Login Failed";
    }
?>

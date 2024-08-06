<?php 
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','e-learning');

    //create connection
    $conn = new mysqli('localhost','root','','e-learning');

    //checking connection
    if($conn->connect_error){
        die('Connection Failed ' . $conn->connect_error);
    }
    else{
        // echo 'Connected';
    }
    
?>
<?php 

try{
    $host = "localhost";
    $db_name = "3c_blogs";
    $user = "root";
    $pass = "";

    $conn = new PDO("mysql:host=$host;dbname=$db_name", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    // if($conn == true){
    //     echo "Connected to Database!";
    // }
}catch(PDOException $e){
    echo $e->getMessage();
}


?>
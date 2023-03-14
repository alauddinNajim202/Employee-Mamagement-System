<?php

    // session start
    session_start();


    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'ems';

    $conn = mysqli_connect($host,$username,$password, $dbname);
    if(!$conn){
        die('Database connection error');
    }

   
        $user_id = $_GET['id'];
        echo $user_id;

        $query = "DELETE FROM users WHERE user_id = $user_id ";

        $result = mysqli_query($conn, $query);
        if($result){
            $_SESSION['success'] = 'Delete successfully';
            header('Location:dashboard.php');
        }else{
            echo 'Data not delete';
        }
   






?>
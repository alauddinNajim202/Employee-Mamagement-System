<?php

    session_start();
    
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'ems';

    $conn = mysqli_connect($host,$username,$password, $dbname);
    if(!$conn){
        die('Database connection error');
    }

    if(!isset($_SESSION['auth'])){
        header('Location: ../login.php');
    }



?>
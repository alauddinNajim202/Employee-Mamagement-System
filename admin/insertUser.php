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

    if(isset($_REQUEST['email'])){
        
        $name  =  $_POST['name'];
        $email =  $_POST['email'];
        $pass  =  md5($_POST['password']);
        $depart = $_POST['depart'];
        $role = $_POST['role'];

        $query = "INSERT INTO users (user_id,name, email, password, department,role)
        VALUES(' ' ,'$name','$email','$pass','$depart','$role')";

        $result = mysqli_query($conn, $query);
        if($result){
            $_SESSION['success'] = 'Registration successfully';
            header('Location:register.php');
        }else{
            echo 'Data not inserted';
        }
    }






?>
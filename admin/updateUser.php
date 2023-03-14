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
        
        $user_id = $_POST['user_id'];
        $name  =  $_POST['name'];
        $email =  $_POST['email'];
        $pass  =  md5($_POST['password']);
        $depart = $_POST['depart'];
        $role = $_POST['role'];
        if($_POST['password'] == ' '){        
        $query = "UPDATE users SET name='$name', email='$email', department='$depart',role='$role' WHERE user_id = '$user_id' ";
        }else{
            $query = "UPDATE users SET name='$name', email='$email', password='$pass', department='$depart',role='$role'  WHERE user_id = '$user_id'";
        }

        $result = mysqli_query($conn, $query);
        if($result){
            $_SESSION['success'] = 'Data updated successfully';
            header('Location:dashboard.php');
        }else{
            echo 'Data not updated';
        }
    }






?>
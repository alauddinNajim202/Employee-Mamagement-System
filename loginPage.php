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

    if(isset($_POST['email'])){
       
        $email = $_POST['email'];
        $pass  = md5($_POST['password']);

        $query = "SELECT * FROM users WHERE email = '$email' AND password = '$pass' ";
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);

        if($count > 0){

            $session_id = session_id();
            $_SESSION['auth'] = $session_id;
            $_SESSION['user_id'] =  $row['user_id'];

            
            $role = $row['role'];
            if($role == 'admin'){
                header('Location:admin/dashboard.php');
            }elseif($role == 'employee'){
                header('Location:employee/dashboard.php');
            }else{
                $_SESSION['error'] = 'Email and Password is not match';
                header('Location:login.php');
            }

        }

    }

?>
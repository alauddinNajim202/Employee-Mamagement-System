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

    if(isset($_REQUEST['leavefrm'])){
        
            $leavefrom  = $_POST['leavefrm'];
            $leaveto  = $_POST['leaveto'];
            $eleave  = $_POST['eleave'];
            $mleave = $_POST['mleave'];
            $cleave = $_POST['cleave'];
            $apply_by  =  $_POST['user_id'];
            $status = "Pending";

       
            $query = "INSERT INTO `apply_leave` (`id`,`leave_from`,`leave_to`,`earn_leave`,`med_leave`,`cau_leave`,`apply_by`,`status`)
            VALUES(' ','$leavefrom','$leaveto','$eleave', '$mleave','$cleave','$apply_by','$status')";

            $result = mysqli_query($conn, $query);
        

            if($result){
                $_SESSION['success'] = 'Leave successfully';
                header('Location:leave.php');
            }else{
                echo 'Data not inserted';
            }

     
        }

   

    






?>
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

    if(isset($_REQUEST['message'])){
        
        $message  =  mysqli_real_escape_string($conn,$_POST['message']);
        $assign_by  =  $_POST['assign_by'];
        $emplists =  $_POST['emp'];

        //print_r($emplists);
        foreach($emplists as $emp){

        $query = "INSERT INTO task1 (task_id,task, user_id, assigned_by)
        VALUES(' ','$message','$emp','$assign_by')";

        $result = mysqli_query($conn, $query);
        

     }

    if($result){
        $_SESSION['success'] = 'Task send successfully';
        header('Location:task.php');
    }else{
        echo 'Task not send';
    }

    }






?>
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

    if(isset($_REQUEST['validfrm'])){
        
        $validfrom  = $_POST['validfrm'];
        $validto  = $_POST['validto'];
        $eleave  = $_POST['eleave'];
        $mleave = $_POST['mleave'];
        $cleave = $_POST['cleave'];
        $assign_by  =  $_POST['assign_by'];
        $emplists =  $_POST['emp'];

        //print_r($emplists);
        foreach($emplists as $emp){

        $query = "INSERT INTO assign_leave (`id`,`valid_from`,`valid_to`,`earning_leave`,`medical_leave`,`causual_leave`,`assign_to`,`assign_by`)
        VALUES(' ','$validfrom','$validto','$eleave', '$mleave','$cleave','$emp','$assign_by')";

        $result = mysqli_query($conn, $query);
        

     }

    if($result){
        $_SESSION['success'] = 'Leave successfully';
        header('Location:leave.php');
    }else{
        echo 'Data not inserted';
    }

    }






?>
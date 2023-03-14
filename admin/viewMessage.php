<?php
    include '../auth/checkAuth.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Message</title>
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

  

  <style>
    
    .register{
      text-align:center;
    }
    .btn{
      background-color:black;
    }

    textarea{
      padding:5px;
    }

  </style>
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
          <?php
            include 'header.php';
          ?>
      </div>
    </div>

    <div class="container col-lg-12 p-4">
      <h3>View Message Details</h3>
      <?php

          $message_id = $_GET['id'];
          $query = "SELECT * FROM task1 WHERE task_id ='".$message_id."'";
              $result = mysqli_query($conn, $query);
              $count = mysqli_num_rows($result);            
              $row = mysqli_fetch_array($result);         
           
      ?>

        <div class="container" style="background-color:#f9f9f9; padding:15px" >
            <?php  echo $row['task'];     ?>
        </div><br>

     <div class="container">
        <div class="row">
          <div class="col-lg-2">
            <h3>Write Reply: </h3>
          </div>
          <div class="col-lg-10">

              <?php
                if(isset($_REQUEST['message_reply'])){
                  $m_id = $_POST['message_id'];
                  $user_id = $_POST['user_id'];
                  $reply = mysqli_real_escape_string($conn, $_POST['message_reply']);


                  $query = "INSERT INTO `tast_reply` (`reply_id`,`reply`,`message_id`,`reply_by`) 
                  VALUES('','$reply','$m_id','$user_id')";
  
                  $res = mysqli_query($conn, $query);
  
                  if($res){
                    echo 'Reply updated !';
                  }else{
                    echo "Error find,Please try agian! ";
                  }
                }

               

              ?>

              <form action="" method="post">

                <input type="hidden" name="message_id" value=" <?php echo $message_id; ?>" >
                <input type="hidden" name="user_id" value=" <?php echo $_SESSION['user_id']; ?>" >

                <textarea name="message_reply" id="" cols="102" rows="10"></textarea>
                
                <button class="btn btn-primary mt-3 " type="submit"> Submit Message  </button>
              </form>
<br>
             <div class="container">
                  <div>
                    <?php

                        $message_id = $_GET['id'];
                        $query1 = "SELECT * FROM `tast_reply` JOIN `users` ON `users`.`user_id`=`tast_reply`.`reply_by` WHERE `message_id` ='".$message_id."'";

                            $result1 = mysqli_query($conn, $query1);
                            $count1 = mysqli_num_rows($result1);            
                           while($row1 = mysqli_fetch_array($result1)){
                            ?>    

                            
                            <div class="container" style="background-color:#f9f9f9; padding:15px" >
                                <?php  echo $row1['name'].':-'.$row1['reply'];     ?>
                            </div><br>
                    <?php
                           }

                    ?>
                  </div>
             </div>

          </div>
        </div>
     </div>

    </div>

    
    </div>
    </div>
  
</body>
</html>




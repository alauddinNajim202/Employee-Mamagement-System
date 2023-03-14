<?php
    include '../auth/checkAuth.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Applied Leave</title>


  <link rel="stylesheet" href="../css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

  

  <style>
    

    .register{
      text-align:center;
    }
    table{
        text-align: center;
    }

    .btn1{
        background-color: rgb(62, 184, 188);

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

    <?php

       if(isset($_POST['approved'])){

        $status = "Approved";
        $comment = $_POST['comment'];
        $id = $_POST['id'];

        $query = "UPDATE `apply_leave` set `status` = '$status', `comment`='$comment' where `id`= '$id' ";

        $result = mysqli_query($conn, $query);

        if($result){
            $_SESSION['success'] = 'Leave successfully';
            header('Location:leave.php');
        }else{
            echo 'Data not inserted';
        }

       }


       if(isset($_POST['rejected'])){

        $status = "Rejected";
        $comment = $_POST['comment'];
        $id = $_POST['id'];


        $query = "UPDATE `apply_leave` set `status` = '$status', `comment`='$comment' where `id`= '$id' ";

        $result = mysqli_query($conn, $query);

        if($result){
            $_SESSION['success'] = 'Update successfully';
            header('Location:allAppliedLeave.php');
        }else{
            echo 'Data not Updated';
        }

    }
        

     

    

       

    ?>

    <div class="container col-lg-12 p-4">
        <h3>All Employee Leave Lists: </h3>

        <?php

        if(isset( $_SESSION['success'])){
            echo  $_SESSION['success'] ;
            unset( $_SESSION['success'] );
        }


        ?>
        <table class="table table-hover">
          <thead>
            <tr class="table-success" >
              <th scope="col">Ser. No. </th>
              <th scope="col">Emp. Name</th>
              <th scope="col">Ear. Leave</th>
              <th scope="col">Med. Leave</th>
              <th scope="col">Cau. Leave</th>
              <th scope="col">Leave From</th>
              <th scope="col">Leave To</th>
              <th scope="col">Status</th>
              <th scope="col">Comment</th>
              <th scope="col">&nbsp</th>
            
           
            </tr>
          </thead>
          <tbody>

          <?php
             $i = 1;
             $query = "SELECT * FROM `apply_leave` join `users` on `apply_leave`.`apply_by` = `users`.`user_id` ";
             $result = mysqli_query($conn, $query);
             $count = mysqli_num_rows($result);

             if($count > 0){
              while($row = mysqli_fetch_array($result)){           

          ?>
          
            <tr class="table-primary">
              <th class="table-secondary" scope="row"> <?php echo $i ; ?> </th>
              <th class="table-secondary" scope="row"> <?php echo $row['name']; ?> </th>
              <th class="table-secondary" scope="row"> <?php echo $row['earn_leave']; ?> </th>
              <th class="table-secondary" scope="row"> <?php echo $row['med_leave']; ?> </th>
              <th class="table-secondary" scope="row"> <?php echo $row['cau_leave']; ?> </th>
              <th class="table-secondary" scope="row"> <?php echo $row['leave_from']; ?> </th>
              <th class="table-secondary" scope="row"> <?php echo $row['leave_to']; ?> </th>
              <th class="table-secondary text-primary" scope="row"> <?php echo $row['status']; ?> </th>
              <th class="table-secondary" scope="row">
                 <form action="" method="post"> <textarea name="comment" id="" ></textarea> </th>
                 <input type="hidden" name="id" value="<?php echo $row['id'];  ?>" >

                    <th class="table-secondary" scope="row">
                    <button type="submit" name="approved" class="btn1" >Approved</button> ||
                    <button type="submit" name="rejected" class="btn1" >Rejected</button> 

                </form>
              </th>

              
             
            </tr>      
            
            <?php $i++; } }else{
              echo 'No data found ';
            } ?>
           
          </tbody>
        </table>
    </div>

    
    </div>
    </div>
  
</body>
</html>




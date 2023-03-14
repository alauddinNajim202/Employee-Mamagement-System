<?php
    include '../auth/checkAuth.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Applied Leave lists</title>
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

  

  <style>
    

    .register{
      text-align:center;
    }
    table{
        text-align: center;
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
        <h3>All Applied Leave:-</h3>
        <table class="table table-hover">
          <thead>
            <tr class="table-success" >
              <th scope="col">Serial No. </th>
              <th scope="col">Leave From</th>
              <th scope="col">Leave To</th>
              <th scope="col">Earn Leave</th>
              <th scope="col">Med Leave</th>
              <th scope="col">Cau Leave</th>
              <th scope="col">Apply_by</th>
              <th scope="col">Status</th>
              <th scope="col">Applied Date</th>
            
           
            </tr>
          </thead>
          <tbody>

          <?php
             $i = 1;
             $user_id = $_SESSION['user_id'];
             $query = "SELECT * FROM `apply_leave` where `apply_by`=$user_id ";
             $result = mysqli_query($conn, $query);
             $count = mysqli_num_rows($result);

             if($count > 0){
              while($row = mysqli_fetch_array($result)){           

          ?>
          
            <tr class="table-primary">
              <th class="table-secondary" scope="row"> <?php echo $i ; ?> </th>
              <th class="table-secondary" scope="row"> <?php echo $row['leave_from']; ?> </th>
              <th class="table-secondary" scope="row"> <?php echo $row['leave_to']; ?> </th>
              <th class="table-secondary" scope="row"> <?php echo $row['earn_leave']; ?> </th>
              <th class="table-secondary" scope="row"> <?php echo $row['med_leave']; ?> </th>
              <th class="table-secondary" scope="row"> <?php echo $row['cau_leave']; ?> </th>
              <th class="table-secondary" scope="row"> <?php echo $row['apply_by']; ?> </th>
              <th class="table-secondary" scope="row"> <?php echo $row['status']; ?> </th>
              <th class="table-secondary" scope="row"> <?php echo $row['applied_date']; ?> </th>
              
             
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




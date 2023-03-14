<?php
    include '../auth/checkAuth.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task</title>
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
        <h3>All Employee Leave Lists:-</h3>
        <table class="table table-hover">
          <thead>
            <tr class="table-success" >
              <th scope="col">Serial No. </th>
              <th scope="col">Employee Name</th>
              <th scope="col">Earning Leave</th>
              <th scope="col">Medical Leave</th>
              <th scope="col">Causual Leave</th>
              <th scope="col">Valid From</th>
              <th scope="col">Valid To</th>
            
           
            </tr>
          </thead>
          <tbody>

          <?php
             $i = 1;
             $query = "SELECT * FROM `assign_leave` join `users` on `assign_leave`.`assign_to` = `users`.`user_id` ";
             $result = mysqli_query($conn, $query);
             $count = mysqli_num_rows($result);

             if($count > 0){
              while($row = mysqli_fetch_array($result)){           

          ?>
          
            <tr class="table-primary">
              <th class="table-secondary" scope="row"> <?php echo $i ; ?> </th>
              <th class="table-secondary" scope="row"> <?php echo $row['name']; ?> </th>
              <th class="table-secondary" scope="row"> <?php echo $row['earning_leave']; ?> </th>
              <th class="table-secondary" scope="row"> <?php echo $row['medical_leave']; ?> </th>
              <th class="table-secondary" scope="row"> <?php echo $row['causual_leave']; ?> </th>
              <th class="table-secondary" scope="row"> <?php echo $row['valid_from']; ?> </th>
              <th class="table-secondary" scope="row"> <?php echo $row['valid_to']; ?> </th>
              
             
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




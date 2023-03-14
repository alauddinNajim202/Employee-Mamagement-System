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
        <h3>All Task Lists:-</h3>
        <table class="table table-hover">
          <thead>
            <tr class="table-success" >
              <th scope="col">Serial No. </th>
              <th scope="col">Task</th>
              <th scope="col">Date</th>
              <th scope="col">Action</th>
           
            </tr>
          </thead>
          <tbody>

          <?php
             $i = 1;
             $query = "SELECT * FROM task1 WHERE user_id ='".$_SESSION['user_id']."'";
             $result = mysqli_query($conn, $query);
             $count = mysqli_num_rows($result);

             if($count > 0){
              while($row = mysqli_fetch_array($result)){           

          ?>
          
            <tr class="table-primary">
              <th class="table-secondary" scope="row"> <?php echo $i ; ?> </th>

              <td class="table-primary"><a href="viewMessage.php?id=<?php echo $row['task_id'] ; ?>"><?php echo substr($row['task'], 0,70); ?></a></td>
             
              <td class="table-danger" ><?php echo $row['date_time'] ; ?></td>
              <td class="table-info"> <a href="viewMessage.php?id=<?php echo $row['task_id'] ; ?>">View</a></td>
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




<?php
    include '../auth/checkAuth.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

  

  <style>
    

    .register{
      text-align:center;
    }
    h3{
      text-align:center;
      color:black;
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
        <?php
            echo "welcome to admin dashboard";
        ?>
        <h3 class = "my-4">User Records </h3>
        <table class="table table-hover">
          <thead>
            <tr class="table-success" >
              <th scope="col">Serial No. </th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Department</th>
              <th scope="col">Role</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>

          <?php
             $i = 1;
             $query = "SELECT * FROM users ";
             $result = mysqli_query($conn, $query);
             $count = mysqli_num_rows($result);

             if($count > 0){
              while($row = mysqli_fetch_array($result)){           

          ?>
          
            <tr class="table-primary">
              <th class="table-secondary" scope="row"> <?php echo $i ; ?> </th>
              <td class="table-dark"><?php echo $row['name'] ; ?></td>
              <td class="table-danger" ><?php echo $row['email'] ; ?></td>
              <td class="table-warning" ><?php echo $row['department'] ; ?></td>
              <td><?php echo $row['role'] ; ?></td>
              <td class="table-info"> <a href="editUser.php?id=<?php echo $row['user_id'] ; ?>">Edit</a> || <a href="deleteUser.php?id=<?php echo $row['user_id'] ; ?>">Delete</a> </td>
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




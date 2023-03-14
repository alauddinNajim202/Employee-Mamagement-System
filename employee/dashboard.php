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
            echo "welcome to employee dashboard";
        ?>
    </div>

    
    </div>
    </div>
  
</body>
</html>




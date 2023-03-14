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
    .container form{
      background-color: #ECF0F1;
      color:black;
      border-radius:10px;
    }


    .register{
      text-align:center;
    }

    .btn{
      background-color:black;
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

  <div class="container col-lg-12 ">
  <form class="px-3 m-4 p-3 " method = "post" action = "insertTask.php" onsubmit = "return formValidation();" >
        <fieldset>
              <legend class =" register ">Task</legend>

              <?php
                  if(isset($_SESSION['success'])){
                    echo $_SESSION['success'];
                    unset( $_SESSION['success']);
                  }
              ?>

                    <div class="row p-4 border1">
                        <div class="col-lg-4 p-2" style="background-color:#C9D2DF" >
                                                                     
                            <fieldset class="form-group">
                            <legend class="mt-4">Employee lists:- <a href="allTask.php" class="btn ms-3 btn-primary">All Task</a> </legend>
                            <input type="hidden" name="assign_by" value=" <?php echo $_SESSION['user_id'];  ?>">
                            <?php
                             
                              $query = "SELECT * FROM users WHERE role = 'employee' ";
                              $result = mysqli_query($conn, $query);
                              $count = mysqli_num_rows($result);
                      
                              while($row = mysqli_fetch_array($result)){           

                            ?>
                            <div class="checkbox">
                                <input class="form-check-input" type="checkbox" name="emp[]"  value="<?php echo $row['user_id']; ?>" >
                                <label class="form-check-label" >
                                <?php echo $row['name']; ?>
                        
                                </label>
                            </div>

                            <?php
                              }
                            ?>
                        
                            
                            </fieldset>                   

                         
                    
                        </div>
                        <div class="col-lg-8" style="background-color:#C9D2D1" >
                            <div class="form-group p-2">
                                <label for="exampleInputName" class="form-label mt-4"><b>Message</b></label>
                                <textarea  class="form-control" name = "message" rows="8"  placeholder="Message"></textarea>
                            </div>
                        </div>

                        <div class="mt-4 col-lg-12 d-flex justify-content-center" >
                                <button type="reset" class="btn mr-2 btn-primary ">Cancel</button>
                                <button type="submit" class="btn ms-3 btn-primary ">Submit</button>
                            </div> 

                    </div>
              
        </fieldset>
</form>
  </div>

  
  </div>
  </div>
  
  



</body>
</html>




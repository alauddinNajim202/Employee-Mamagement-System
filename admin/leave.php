<?php
    include '../auth/checkAuth.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Assaign Employee Leave</title>
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
                <form class="px-3 m-4 p-3 " method = "post" action = "insertLeave.php"  >
                    <fieldset>
                    <legend class =" register ">Assaign Leave</legend>

                    <?php
                        if(isset($_SESSION['success'])){
                            echo $_SESSION['success'];
                            unset( $_SESSION['success']);
                        }
                    ?>

                            <div class="row p-4 border1">
                            <legend class="mt-4">Employee lists:- <a href="allLeave.php" class="btn ms-3 btn-primary">All Leave</a> 
                            <a href="allAppliedLeave.php" class="btn ms-3 btn-primary">All Applied Leave</a> </legend>
                                <div class="col-lg-3 p-4" style="background-color:#C9D2DF" >
                                                                            
                                    <fieldset class="form-group">
                                   
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
                                <div class="col-lg-9 p-2" style="background-color:#C9D2D1" >

                                    <div class="form-group p-2">
                                        <label for="exampleInputName" class="form-label mt-1 col-lg-4 "><b>Valid From:</b></label>
                                        <input type="date" class="col-lg-5 " name="validfrm" id="" placeholder="dd/mm/yyyy">
                                    </div>

                                    <div class="form-group p-2">
                                        <label for="exampleInputName" class="form-label mt-1 col-lg-4 "><b>Valid To:</b></label>
                                        <input type="date" class="col-lg-5" name="validto" id="" placeholder="dd/mm/yyyy">
                                    </div>

                                    <div class="form-group p-2">
                                        <label for="exampleInputName" class="form-label mt-1 col-lg-4 "><b>Earning Leave :</b></label>
                                        <input type="text" class="col-lg-5" name="eleave" id="" placeholder="number of leave">
                                    </div>

                                    <div class="form-group p-2">
                                        <label for="exampleInputName" class="form-label mt-1 col-lg-4 "><b>Medical Leave :</b></label>
                                        <input type="text" class="col-lg-5" name="mleave" id="" placeholder="number of leave">
                                    </div>

                                    <div class="form-group p-2">
                                        <label for="exampleInputName" class="form-label mt-1 col-lg-4 "><b>Causual Leave :</b></label>
                                        <input type="text" class="col-lg-5" name="cleave" id="" placeholder="number of leave">
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




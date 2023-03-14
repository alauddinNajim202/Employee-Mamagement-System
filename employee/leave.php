<?php
    include '../auth/checkAuth.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Leave</title>
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

  

  <style>
    

    .register{
      text-align:center;
    }
    table{
        text-align: center;
    }
    form{
        border: 2px solid black;
        padding:5px;
    }
    form .form-card{
        border-radius:5px;
        padding:5px;
        background-color: powderblue;
        
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

    <div class="container col-lg-12 p-4">
        <h3>Leave Lists:- <a href="appliedLeave.php" class="btn ms-3 btn-primary">All Applied Leave</a> </h3>
        <table class="table table-hover">
          <thead>
            <tr class="table-success" >
            
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
             $user_id = $_SESSION['user_id'];
             $query = "SELECT * FROM assign_leave join `users` on `assign_leave`.`assign_to` = `users`.`user_id` 
             WHERE `users`.`user_id` = $user_id";

             $result = mysqli_query($conn, $query);
             $count = mysqli_num_rows($result);

             if($count > 0){
              while($row = mysqli_fetch_array($result)){           

          ?>
          
            <tr class="table-primary">
             
              <th class="table-secondary" scope="row"> <?php echo $row['name']; ?> </th>
              <th class="table-secondary earning_leave" scope="row"> <?php echo $row['earning_leave']; ?> </th>
              <th class="table-secondary medical_leave" scope="row"> <?php echo $row['medical_leave']; ?> </th>
              <th class="table-secondary causual_leave" scope="row"> <?php echo $row['causual_leave']; ?> </th>
              <th class="table-secondary valid_from" scope="row"> <?php echo $row['valid_from']; ?> </th>
              <th class="table-secondary valid_to " scope="row"> <?php echo $row['valid_to']; ?> </th>
              
             
            </tr>      
            
            <?php $i++; } }else{
              echo 'No data found ';
            } ?>
           
          </tbody>
        </table>

        <form class=" " method = "post" action = "appyLeave.php"  >
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];  ?> "  >
                    <fieldset>
                    <legend class =" register ">Apply For Leave</legend>
                    <p>
                      <?php
                        if(isset($_SESSION['success'])){
                          echo $_SESSION['success'];
                          unset($_SESSION['success']);
                        }
                      ?>
                    </p>
                                <div class="col-lg-12 form-card" style="background-color:#C9D2D1" >

                                    <div class="form-group p-2">
                                        <label for="exampleInputName" class="form-label mt-1 col-lg-5 "><b>Leave From:</b></label>
                                        <input type="date" class="col-lg-5 form-card " name="leavefrm" id="" placeholder="dd/mm/yyyy" onblur="checkDate(this.value)">
                                    </div>

                                    <div class="form-group p-2">
                                        <label for="exampleInputName" class="form-label mt-1 col-lg-5 "><b>Leave To:</b></label>
                                        <input type="date" class="col-lg-5 form-card" name="leaveto" id="" placeholder="dd/mm/yyyy" onblur="checkDate(this.value)" >
                                    </div>

                                    <div class="form-group p-2">
                                        <label for="exampleInputName" class="form-label mt-1 col-lg-5 "><b>Earning Leave :</b></label>
                                        <input type="text"  class="col-lg-5 form-card " name="eleave" id="" placeholder="number of leave"   >
                                    </div>

                                    <div class="form-group p-2">
                                        <label for="exampleInputName" class="form-label mt-1 col-lg-5 "><b>Medical Leave :</b></label>
                                        <input type="text" class="col-lg-5 form-card" name="mleave" id="" placeholder="number of leave"  >
                                    </div>

                                    <div class="form-group p-2">
                                        <label for="exampleInputName" class="form-label mt-1 col-lg-5 "><b>Causual Leave :</b></label>
                                        <input type="text" class="col-lg-5 form-card" name="cleave" id="" placeholder="number of leave"  >
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

    <script>
      function checkDate(str){
        var valid_from = $('.valid_from').text();
        var valid_to = $('.valid_to').text();
        var leave_from = str;
        

        var date1 = new Date(valid_from);
        var date2 = new Date(leave_from);
        var diffDays = parseInt((date2-date1)/(1000 * 3600 * 24));

        var date3 = new Date(leave_from);
        var date4 = new Date(valid_to);
        var diffDays = parseInt((date4-date3)/(1000 * 3600 * 24));

        if( diffDays>=0 && diffDays2>=0 ){

        }else{
          alert("Please Enter Valid Date");
          
        }
      }

      // function checkEleave(str){
      //   var valid_from = $('.earning_leave').text();
      //   var leave_q = str;

      //   if( valid_from >= leave_q){
      //     return true;
      //   }else{
      //     alert('Please Enter valid quantity');
      //     return false;

      //   }
      // }

      
      // function checkMleave(str){
      //   var valid_from = $('.medical_leave').text();
      //   var leave_q = str;

      //   if( valid_from >= leave_q){
      //     return true;

      //   }else{
      //     alert('Please Enter valid quantity');
      //     return false;

      //   }
      // }

      
      // function checkEleave(str){
      //   var valid_from = $('.causual_leave').text();
      //   var leave_q = str;

      //   if( valid_from >= leave_q){
      //     return true;

      //   }else{
      //     alert('Please Enter valid quantity');
      //     return false;
      //   }
      //}
    </script>
  
</body>
</html>




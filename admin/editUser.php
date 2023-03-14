<?php
    include '../auth/checkAuth.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

  <script>

    function formValidation(){
      var name = $('#InputName').val();
      var email = $('#InputEmail').val();
      var password = $('#InputPassword').val();
      var passLength = $('#InputPassword').val().length;
      

      if( name == ''){
        alert("Please Enter Your Name");
        return false;
      }

      if( email == ''){
        alert("Please Enter Your Email");
        return false;
      }

    }

  </script>

  <style>
    .container form{
      background-color: #ECF0F1;
      color:black;
    }

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
  <form class="px-3 p-4 m-4 p-2" method = "post" action = "updateUser.php" onsubmit = "return formValidation();" >
        <fieldset>
              <legend class =" register ">Edit user details </legend>

              <?php
                  if(isset($_SESSION['success'])){
                    echo $_SESSION['success'];
                    unset( $_SESSION['success']);
                  }
              ?>

              <div class="row p-2">
                  <div class="col-lg-6">
                    <?php
                    $user_id = $_GET['id'];
                    $query = "SELECT * FROM users WHERE user_id = '$user_id' ";
                    $result = mysqli_query($conn, $query);
                    $data = mysqli_fetch_array($result);


                    ?>
                    <input type="hidden" name="user_id" value=" <?php echo $user_id; ?>">

                    <div class="form-group">
                        <label for="exampleInputName" class="form-label mt-4">Name</label>
                        <input type="text" class="form-control" name = "name" id="InputName" placeholder="Name" value=" <?php echo $data['name']; ?>">
                      </div>

                      <div class="form-group">
                            <label for="exampleInputEmail" class="form-label mt-4 mb-2">Email</label>
                            <input type="email" class="form-control" name = "email" id="InputEmail" placeholder="Email" value=" <?php echo $data['email']; ?>">
                      </div> 
                      <div class="form-group">
                        <label for="exampleInputPassword" class="form-label mt-4">Password</label>
                        <input type="password" class="form-control" name = "password" id="InputPassword" placeholder="Password">
                      </div>
                
                    
                  </div>

                  <div class="col-lg-6 p-4">
                  <fieldset class="form-group">
                          <legend class="mt-4">Departments: </legend>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="depart" id="depart"
                            value="Web Development" <?php if($data['department'] =='Web Development'){
                                echo "checked";
                            } ?>>
                            <label class="form-check-label" >
                            Web Development
                      
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="depart" id="depart" value="Graphics Designer"
                            <?php if($data['department'] =='Graphics Designer'){
                                echo "checked";
                            } ?>>
                            <label class="form-check-label" >
                            Graphics Designer
                            </label>
                          </div>
                        
                        </fieldset>

                        <fieldset class="form-group">
                          <legend class="mt-4">Role: </legend>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="role" value="admin" <?php if($data['role'] =='admin'){
                                echo "checked";
                            } ?> >
                            <label class="form-check-label" >
                              Admin
                      
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="role" value="employee" <?php if($data['role'] =='employee'){
                                echo "checked";
                            } ?>>
                            <label class="form-check-label" >
                              Employee
                            </label>
                          </div>
                        
                      </fieldset>

                        <div class="mt-3" >
                          <button type="reset" class="btn mr-2 btn-primary ">Cancel</button>
                          <button type="submit" class="btn ms-3 btn-primary ">UPDATE</button>
                        </div>
                  </div>

                  
              </div>
              
              </fieldset>
</form>
  </div>

  
  </div>
  </div>
  
  



</body>
</html>




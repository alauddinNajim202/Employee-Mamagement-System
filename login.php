<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

  <script>

    function formValidation(){
      
      var email = $('#InputEmail').val();
      var password = $('#InputPassword').val();
      var passLength = $('#InputPassword').val().length;
          

      if( email == ''){
        alert("Please Enter Your Email");
        return false;
      }

      if( password == ''){
        alert("Please Enter Your Password");
        return false;
      }

      if( passLength <= 4){
        alert("Please Enter Password At least 5 Digit");
        return false;
      }


    }

  </script>

  <style>
    .container form{
      background-color: rgb(0, 76, 100);
      border-radius:10px;
      color:white;
    }

    .register{
      text-align:center;
      
    }
    .register h2{
        color:white;
    }
    h4{
        color:white;
    }
  
    
  </style>
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
          <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light px-4">
              <div class="container-fluid">

                <div>
                  <a class="navbar-brand" href="#">Employee</a>
                </div>            
                
                <button class="btn btn-secondary my-1 my-sm-0 mx-3" type="submit">
                  <a class="nav-link" href="login.php">Login</a>
                </button>
                    
                 
                  
              
              </div>
            </nav>
          </header>
      </div>
    </div>

  <div class="container col-lg-7   p-4">
    <form class="px-3 p-4 m-4 p-2" method = "post" action = "loginPage.php" onsubmit = "return formValidation();" >
            <fieldset>
                <legend class="register" ><h2>Login</h2></legend> 

                <?php

                    if(isset($_SESSION['success'])){
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    }

                    if(isset($_SESSION['error'])){
                      echo $_SESSION['error'];
                      unset($_SESSION['error']);
                  }
                ?>
                
            <div class="row">
                <div class="col-lg-12">
                            <div class="form-group">
                                <label for="exampleInputEmail" class="form-label mt-4"><h4>Email</h4></label>
                                <input type="email" class="form-control" name = "email" id="InputEmail" placeholder="Email">
                            </div>  

                            <div class="form-group">
                                <label for="exampleInputPassword" class="form-label mt-4"><h4>Password</h4></label>
                                <input type="password" class="form-control" name = "password" id="InputPassword" placeholder="Password">
                            </div>
                        
                        
                            <div class="mt-4" >
                                <button type="submit" class="btn  btn-primary ">Sign In</button>
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




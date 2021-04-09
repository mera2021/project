<?php 

  # Login Code . . . 
   require 'logic/connection.php';
   require 'logic/helperFunctions.php';

   $ErrorMessage = [];
   $ErrorFlag    = 0;
   $Message      = ""; 

  if($_SERVER['REQUEST_METHOD'] == "POST"){

    $email    = cleanInputs($_POST['email']);
    $password = $_POST['password']; 



     if(empty($email)  || empty($password) ){

        $ErrorFlag = 1;
        $ErrorMessage['Empty'] = "Empty fields";
     }


     if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $ErrorFlag = 1;
        $ErrorMessage['Email'] = "Invalid Email";
     }


     if(strlen($password) < 6){
        $ErrorFlag = 1;
        $ErrorMessage['Password'] = "Length must be > 6 chars";
     }
    


      if($ErrorFlag == 0){

         $password = md5($password);

          $sql = "select * from admins where email='$email' and password='$password'";
          $query = "select * from professors where email='$email' and password='$password'";
          $op = mysqli_query($con,$sql);
          $oper = mysqli_query($con,$query);
          $count = mysqli_num_rows($op);
          $count1 = mysqli_num_rows($oper);
          if(($count == 1) || ($count1 == 1))
{
          $_SESSION['adminData'] =  mysqli_fetch_assoc($op);
          $_SESSION['adminData1'] =  mysqli_fetch_assoc($oper);

           header("Location: index.php");

          }else{

             $Message = "error in login";
          }

      }


  }



?>







<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    
                                <?php 
                                
                                if($ErrorFlag == 1){

                                    foreach($ErrorMessage as $key => $data){

                                        echo '*'.$key.' '.$data;
                                    }
                                }else{
                                    echo $Message;
                                }
                                
                                
                                
                                ?>

                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form   action="index.php"   method="post" >
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4"  name="email"  id="inputEmailAddress" type="email" placeholder="Enter email address" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4"  name="password" id="inputPassword" type="password" placeholder="Enter password" />
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Forgot Password?</a> 
                                                 <input class="btn btn-primary" type="submit" value="Login">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="../../register.php">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

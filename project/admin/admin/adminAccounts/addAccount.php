<?php    



require '../logic/connection.php';
include '../logic/helperFunctions.php';



  $sql = "select * from adminroles";
  $op  = mysqli_query($con,$sql); 


  $ErrorFlag = 0;
  $ErrorMessage = [];
  $message = '';

if($_SERVER['REQUEST_METHOD'] == "POST"){

  $name     = cleanInputs($_POST['name']);
  $email    = cleanInputs($_POST['email']);
  $password = htmlspecialchars(trim($_POST['password']));
  $address  = cleanInputs($_POST['address']);
  $phone    = cleanInputs($_POST['phone']); 
  $role     = cleanInputs($_POST['role']); 



  if(empty($name) || empty($email)  || empty($password) || empty($address) || empty($phone) || empty($role) ){
   $ErrorFlag = 1;
   $ErrorMessage['empty'] = "Empty field";
    }
    
    
  

      $NamePattern  = "/^[a-zA-Z]*$/";
      $AddressPattern  = "/^[a-zA-Z\s*]*$/";
      $phonePattern = "/^\d{11}$/";

      if(!preg_match($NamePattern,$name)){
          $ErrorFlag = 1;
          $ErrorMessage['name'] = "inValid String";
      }


      if(!preg_match($phonePattern,$phone)){
          $ErrorFlag = 1;
          $ErrorMessage['phone'] = "inValid Phone Number";
      }



      if( strlen($password) < 6  ){
          $ErrorFlag = 1;
          $ErrorMessage['Password'] = "Length must be > 6";
      }


    $email = filter_var($email,FILTER_SANITIZE_EMAIL);

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $ErrorFlag = 1;
      $ErrorMessage['email'] = "invalid Email";
    }


    if(!preg_match($AddressPattern,$address)){
      $ErrorFlag = 1;
      $ErrorMessage['address'] = "inValid String";
  }



 /* if(!isset($_FILES['image'])){
      $ErrorFlag = 1;
      $ErrorMessage['image'] = "Empty image ";
 }*/




  $fileTmpName = $_FILES['image']['tmp_name'];
  $fileName = $_FILES['image']['name'];
  $fileSize = $_FILES['image']['size'];
  $fileType = $_FILES['image']['type'];



  $fileExt = explode('.',$fileName);    
  
   $count =   count($fileExt);
  

  $extension = strtolower($fileExt[$count-1]);

    $imgName = time().$fileExt[0].'.'.$extension;
  
    $allow_ex = array('jpg','gif','png');
   
     
if(in_array($extension,$allow_ex)){
$uploadFolder = '../uploads/'; 
$destPath = $uploadFolder.$imgName;

if(move_uploaded_file($fileTmpName,$destPath)){
 echo 'File Uploaded';
}else{

  $ErrorFlag = 1;
  $ErrorMessage['image'] = "Error in Upload File";
}

 }
                                                 
 

  



        if($ErrorFlag == 0){


            $password = md5($password);
            $sql = "insert into admins (name,email,password,address,role,phone,image) values('$name','$email','$password','$address','$role','$phone','$imgName')";

            $op = mysqli_query($con,$sql);
            if($op){
                $message = "Data Inserted";
                header("Location: displayAccounts.php");

            }
        }

}





?>





<?php 
include '../layouts/header.php';

?>

<body class="sb-nav-fixed">


<?php    

include '../layouts/nav.php';

?>

<div id="layoutSidenav">


    <?php    

    include '../layouts/sidNav.php';
?>
    



    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Add Account</li>
                        </ol>
                        <!-- <div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div> -->
                        <div class="card mb-4">
                          
                        
        <?php 
    

        if($ErrorFlag == 1){

         foreach( $ErrorMessage as $key => $err_message){

           echo '*'.$key.' : '.$err_message.'<br>';

         }

        }else{
            echo $message;
        }

        ?>                
                        
                        
                       <!-- form  -->

                       <div class="card-body">
                                        <form  action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post"  enctype="multipart/form-data" >
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Name</label>
                                                <input class="form-control py-4"  name="name" id="inputEmailAddress" type="text" placeholder="Enter name"  required />
                                            </div>


                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4"  name="email" id="inputEmailAddress" type="email" placeholder="Enter email"  required />
                                            </div>


                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Password</label>
                                                <input class="form-control py-4"  name="password" id="inputEmailAddress" type="password" placeholder="Enter password"  required />
                                            </div>


                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Address</label>
                                                <input class="form-control py-4"  name="address" id="inputEmailAddress" type="text" placeholder="Enter Address"  required />
                                            </div>



                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">phone</label>
                                                <input class="form-control py-4"  name="phone" id="inputEmailAddress" type="text" placeholder="Enter phone"  required />
                                            </div>


                                         

                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Role</label>
                                              
                                                <select name="role" class="form-control py-4">
                                                   <option> select Role </option>
                                                <?php    while($data = mysqli_fetch_assoc($op)) { ?>
                                                <option value="<?php echo $data ['id']; ?>" > <?php echo $data['title']; ?></option>    
                                                <?php } ?>

                                                 </select>

                                            </div>


                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Upload Image</label>
                                                <input class="form-control py-4"  name="image" id="inputEmailAddress" type="file" />
                                            </div>


                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                               <input type="submit" class="btn btn-primary" value="Save"> 
                                            </div>
                                        </form>
                                    </div>



                    </div>





                </main>
            



                
            <?php    

include '../layouts/footer.php';

?>
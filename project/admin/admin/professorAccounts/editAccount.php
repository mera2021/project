<?php    


require '../logic/connection.php';
include '../logic/helperFunctions.php';



    if($_SERVER['REQUEST_METHOD'] == "GET"){

        $id  =  filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    
         $sql =  "select * from  professors   where id = ".$id;



         $op = mysqli_query($con,$sql);
      
    
         if(mysqli_num_rows($op) == 0){
    
            $_SESSION['Message'] = "no user founded with this id";
        
            header('Location: displayAccounts.php'); 
        
            }else{
            $data = mysqli_fetch_assoc($op);

           $sql = "select * from departments";
           $roles  = mysqli_query($con,$sql); 
    
         }
    
    
    }




   $ErrorFlag = 0;
   $ErrorMessage = [];
   $message = '';
 
 if($_SERVER['REQUEST_METHOD'] == "POST"){
   $id       = $_POST['id'];
   $name     = cleanInputs($_POST['name']);
   $email    = cleanInputs($_POST['email']);
   $password = htmlspecialchars(trim($_POST['newpassword']));
   $address  = cleanInputs($_POST['address']);
   $phone    = cleanInputs($_POST['phone']) ; 
   $department     = cleanInputs($_POST['department']); 
   $oldImage = $_POST['oldImage'];
 
 
   if(empty($name) || empty($email) || empty($address) || empty($phone) || empty($department) ){
    $ErrorFlag = 1;
    $ErrorMessage['empty'] = "Empty field";
     }
     
     
   
 
       $NamePattern  = "/^[a-zA-Z\s*]*$/";
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
 
 
 if(!empty($password)){
       if( strlen($password) < 6  ){
           $ErrorFlag = 1;
           $ErrorMessage['Password'] = "Length must be > 6";
       }
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

 

if(!empty($_FILES['image']['name']) && isset($_FILES['image']['name'])){
 
   $fileTmpName = $_FILES['image']['tmp_name'];
   $fileName = $_FILES['image']['name'];
   $fileSize = $_FILES['image']['size'];
   $fileType = $_FILES['image']['type'];
 
 

    if(file_exists('../uploads/'.$oldImage)){
        unlink('../uploads/'.$oldImage);
    }


 
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
 
  }else{
     $ErrorFlag = 1;
     $ErrorMessage['image'] = "Error in file extension ";       
 
 }
 

 $oldImage = $imgName;

}
 
 
         if($ErrorFlag == 0){
 
            if(!empty($password)){
             
             $password = md5($password);
             $sql    = "update professors  set  name ='$name', email = '$email', password = '$password',address = '$address',phone = '$phone',image = '$oldImage',department = '$department'  where id=".$id;
          
            }else{
                $sql    = "update professors  set  name ='$name', email = '$email',address = '$address',phone = '$phone', image = '$oldImage',department = '$department'  where id=".$id;
            }




             $op = mysqli_query($con,$sql);
             if($op){
                 $message = "Data updated";
                header("Location: editAccount.php?id=".$id);
 
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
                            <li class="breadcrumb-item active">Edit Account</li>
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
                                            <input class="form-control py-4"  name="name"  value="<?php echo $data['name'];?>"  id="inputEmailAddress" type="text" placeholder="Enter name"  required />
                                        </div>

                                      <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input class="form-control py-4"  name="email"  value="<?php echo $data['email'];?>" id="inputEmailAddress" type="email" placeholder="Enter email"  required />
                                        </div>


                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">New Password</label>
                                            <input class="form-control py-4"  name="newpassword" id="inputEmailAddress" type="password" placeholder="Enter password"   />
                                        </div>


                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Address</label>
                                            <input class="form-control py-4"  name="address" value="<?php echo $data['address'];?>"  id="inputEmailAddress" type="text" placeholder="Enter Address"  required />
                                        </div>



                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">phone</label>
                                            <input class="form-control py-4"  name="phone"  value="<?php echo $data['phone'];?>" id="inputEmailAddress" type="text" placeholder="Enter phone"  required />
                                        </div>


                                     

                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Role</label>
                                          
                                            <select name="department" class="form-control py-4">
                                               <option> select Department </option>
                                            <?php    while($role_data = mysqli_fetch_assoc($roles)) { ?>
                                            <option value="<?php echo $role_data ['id']; ?>"     <?php if($data['dep_id']  ==  $role_data['id'] ){ echo 'selected';}?>   > <?php echo $role_data['name']; ?></option>    
                                            <?php } ?>

                                             </select>

                                        </div>


                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Upload Image</label>
                                            <input class="form-control py-4"  name="image" id="inputEmailAddress" type="file"  />
                                          <p> <img src="<?php echo url('/uploads/'.$data['image']);?>" width="60"  height="60" ></p>
                                       
                                       <input type="hidden"  name="oldImage" value="<?php echo $data['image']; ?>">
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
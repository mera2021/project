<?php    
 # connection file . . . 
require '../logic/connection.php';
include '../logic/helperFunctions.php';




    
    # Logic . . . 

    $ErrorFlag = 0;
    $ErrorMessage = '';
    $message = '';

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $title = cleanInputs($_POST['name']);
     
    if(empty($title)){
     $ErrorFlag = 1;
     $ErrorMessage = "Empty field";

      }else{

        $pattern  = "/^[a-zA-Z\s*]+$/";

        if(!preg_match($pattern,$title)){

            $ErrorFlag = 1;
            $ErrorMessage = "inValid String";

        }else{


            $sql = "select id from departments where name ='$title'";
            $count = mysqli_num_rows(mysqli_query($con,$sql));

            

            if($count == 1){

                $ErrorFlag = 1;
                $ErrorMessage = "Title Used Before";

            }else{

          $sql = "insert into departments (name) values ('$title')";

           $op =  mysqli_query($con,$sql);


           if($op){
             $message = "Data inserted";
           }
        }

        }

      }

     


      header('Location: display.php');



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
                            <li class="breadcrumb-item active">Add Category</li>
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
            echo '* '.$ErrorMessage;
        }else{
            echo $message;
        }

        ?>                
                        
                        
                       <!-- form  -->


                       <div class="card-body">
                                        <form  action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Title</label>
                                                <input class="form-control py-4"  name="name" id="inputEmailAddress" type="text" placeholder="Enter Role title"  required />
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
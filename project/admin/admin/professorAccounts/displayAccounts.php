<?php    

require '../logic/connection.php';
include '../logic/helperFunctions.php';


include '../layouts/header.php';

?>

<body class="sb-nav-fixed">


<?php    

include '../layouts/nav.php';

?>

<div id="layoutSidenav">


    <?php    

    include '../layouts/sidNav.php';

   // where professors.name =".$_SESSION['adminData1']['id'];

    $sql = "select professors.* , departments.name as dep_name from professors join departments on professors.dep_id = departments.id ";

    $op =  mysqli_query($con,$sql);





?>




            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/project/admin/admin/index.php">Home</a></li>
                            <li class="breadcrumb-item active">professor Accounts</li>
                        </ol>
                        <!-- <div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div> -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                               Data || <a href="addAccount.php">addAccount</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>email</th>
                                                <th>address</th>
                                                <th>phone</th>
                                                <th>image</th>
                                                <th>Department</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
            
                                        <tbody>
                                            
                                     <?php 
                                     
                                      while($data = mysqli_fetch_assoc($op))
                                      {
                                     
                                     ?>   
                                            <tr>
                                                <td><?php echo $data['id'];?></td>
                                                <td><?php echo $data['name'];?></td>
                                                <td><?php echo $data['email'];?></td>
                                                <td><?php echo $data['address'];?></td>
                                                <td><?php echo $data['phone'];?></td>
                                                <td>   
                                                
                                                <?php 
                                                 
                                                    if(empty($data['image'])){
                                                        $image = "appoinment.png";
                                                    }else{
                                                        $image = $data['image'];
                                                    }
                                                ?>
                                                
                                                <img src="<?php echo url('/uploads/'.$image)?>" width="60"  height="60" >
                                                
                                                
                                                
                                                
                                                </td>
                                                <td><?php echo $data['dep_name'];?></td>
                                                <td>    
                                                  <a href ="deleteAccount.php?id=<?php echo $data['id']; ?>">Delete</a>
                                                  ||
                                                  <a href ="editAccount.php?id=<?php echo $data['id']; ?>">Edit</a>    
                                               </td>                               
                                            </tr>
                                      <?php 
                                        }
                                      ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            



                
            <?php    

include '../layouts/footer.php';

?>
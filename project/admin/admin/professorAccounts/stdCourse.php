<?php    

require '../logic/connection.php';

include '../layouts/header.php';

?>

<body class="sb-nav-fixed">


<?php    

include '../layouts/nav.php';

?>

<div id="layoutSidenav">


    <?php    

    include '../layouts/sidNav.php';



    $sql = "select professors.name as prof_name , prof_stu.* ,student.first_name ,departments.name as dep_name  from professors join prof_stu on professors.id = prof_stu.prof_id join student on student.id = prof_stu.stu_is join departments on professors.dep_id = departments.id";

    $op =  mysqli_query($con,$sql);





?>




            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/project/admin/admin/index.php">Home</a></li>
                            <li class="breadcrumb-item active">professor</li>
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
                               Data 
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Professor</th>
                                                <th>Student</th>
                                                <th>Department</th>
                                                
                                            </tr>
                                        </thead>
            
                                        <tbody>
                                            
                                     <?php 
                                     
                                      while($data = mysqli_fetch_assoc($op))
                                      {
                                     
                                     ?>   
                                            <tr>
                                                <td><?php echo $data['id'];?></td>
                                
                                                <td><?php echo $data['prof_name'];?></td>
                                                <td><?php echo $data['first_name'];?></td>
                                                <td><?php echo $data['dep_name'];?></td>
                              
                                            </tr>
                                      <?php 
                                        }
                                      ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>




                            <div class="container-fluid">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">professor</li>
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
                               Data 
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                
                                                <th>Student</th>
                                                <th>Course</th>
                                                
                                                <th>Department</th>
                                                
                                            </tr>
                                        </thead>
            
                                        <tbody>
                                            
                                     <?php 
                                     
                                      while($data_role = mysqli_fetch_assoc($role))
                                      {
                                     
                                     ?>   
                                            <tr>
                                                <td><?php echo $data_role['id'];?></td>
                                
                                                <td><?php echo $data_role['first_name'];?></td>
                                                <td><?php echo $data_role['sub_name'];?></td>
                                
                                                <td><?php echo $data['dep_name'];?></td>
                              
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
                    </div>
                </main>
            



                
            <?php    

include '../layouts/footer.php';

?>











<?php    


$sql = "select student_sub.* , student.first_name ,subjects.sub_name ,departments.name as dep_name  from student join student_sub on student_sub.user_id = student_id join student_sub on student_sub.sub_id = subjects.id join departments on subjects.dep_id = departments.id ";

$role =  mysqli_query($con,$sql);


              


?>












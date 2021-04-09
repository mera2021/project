<?php

require '../logic/connection.php';
//include '../logic/checkSuperAdmin.php';
include '../layouts/header.php';

?>



<body class="sb-nav-fixed">
   
<?php

include '../layouts/nav.php';

?>



<div id="layoutSidenav">


    <?php

    include '../layouts/sidNav.php';

    $sql = "select * from adminroles";

    $op = mysqli_query($con , $sql);





    ?>


            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/project/admin/admin/index.php">Home</a></li>
                            <li class="breadcrumb-item active">Admin Roles</li>
                        </ol>

                        <!--<div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div>-->

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Data || <a href="addRole.php">Add Role</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>


                                        <tbody>

                                        <?php 
                                        
                                        while($data = mysqli_fetch_assoc($op)){

                                        ?>
                                            <tr>
                                                <td><?php  echo $data['id']; ?></td>
                                                <td><?php  echo $data['title']; ?></td>
                                                <td>    
                                                  <a href ="deleteRole.php?id=<?php echo $data['id']; ?>">Delete</a>
                                                  ||
                                                  <a href ="editRole.php?id=<?php echo $data['id']; ?>">Edit</a>    
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

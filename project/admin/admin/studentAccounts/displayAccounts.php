
<?php    

require '../logic/connection.php';
require '../logic/helperFunctions.php';

include '../layouts/header.php';

?>

<body class="sb-nav-fixed">


<?php    

include '../layouts/nav.php';

?>



<div id="layoutSidenav">

<?php    

include '../layouts/sidNav.php';

    $sql = "select student.* , departments.name as dep_name from student join departments on student.dep_id = departments.id ";

    $op =  mysqli_query($con,$sql);





?>








    <!-- container -->
    <div >


        <!-- PHP code to read records will be here -->
        <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/project/admin/admin/index.php">Home</a></li>
                            <li class="breadcrumb-item active">Students</li>
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
                               Data || <a href="http://localhost/project/register.php" >Add Student</a>
                            </div>

        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Department</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            
<?php

while($data = mysqli_fetch_assoc($op))

echo '
<tr>
<td>'.$data['id'].'</td>
<td>'.$data['first_name'].'</td>
<td>'.$data['last_name'].'</td>
<td>'.$data['mobile'].'</td>
<td>'.$data['email'].'</td>
<td>'.$data['dep_name'].'</td>
<td><img style="width:150px;height:150px;" src="../../../upload/'.$data['image'].'"></td>
<td><a href="deleteAccount.php?id='.$data['id'].'" class="btn btn-danger m-r-1em">Delete</a>
<a href="editAccount.php?id='.$data['id'].'" class="btn btn-primary m-r-1em">Edit</a></td>
</tr>';

?>


            <!-- table body will be here -->

             <!-- <a href='' class='btn btn-danger m-r-1em'>Delete</a>
            <a href='' class='btn btn-primary m-r-1em'>Edit</a> -->


            <!-- end table -->
        </table>

    </div>
    <!-- end .container -->


<?php    

include '../layouts/footer.php';

?>
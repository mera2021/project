
<?php
require "connection.php";

$sql = "select * from departments";
$op  = mysqli_query($con,$sql); 


?>



<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Register</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>
    
<body>
    
    <!-- latest_coures_area_start  -->
    <div data-scroll-index='1' class="admission_area">
        <div class="admission_inner">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-7">
                        <div class="admission_form">
                            <h3>Apply for Admission</h3>
                            <form action="validation.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="single_input">
                                            <input type="text" name="fname" placeholder="First Name" >
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="single_input">
                                            <input type="text" name="lname" placeholder="Last Name" >
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="single_input">
                                            <input type="date" name="date" placeholder="Date of Birth" >
                                        </div>
                                    </div>

                                
                                    <div class="col-md-4">
                                        <div class="single_input">
                                            <input type="text" name="national" placeholder="Nationality" >
                                        </div>
                                    </div>

                                    <div>
                                        <div class="form-check" class="col-md-2">
                                            <input class="single_input" type="radio" value="male" name="gender" id="flexRadioDefault1" checked>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Male
                                            </label>
                                        </div>
                                            <div class="form-check" class="col-md-2">
                                            <input class="single_input" type="radio" value="female" name="gender" id="flexRadioDefault2" >
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Female
                                            </label>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="single_input">
                                            <input type="text" name="schooln" placeholder="School Name" >
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="single_input">
                                            <input type="text" name="gradper" placeholder="Graduation Percentage" >
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="single_input">
                                            <input type="text" name="starty" placeholder="Start Year" >
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="single_input">
                                            <input type="text" name="grady" placeholder="Graduation Year" >
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="single_input">
                                            <input type="text" name="phone" placeholder="Phone Number" >
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="single_input">
                                            <input type="text" name="email" placeholder="Email Address" >
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="single_input">
                                            <input type="text" name="usern" placeholder="User Name" >
                                        </div>
                                    </div>                              

                                    <div class="col-md-6">
                                        <div class="single_input">
                                            <input type="text" name="password" placeholder="Password" >
                                        </div>
                                    </div>







                                    <div class="col-md-12">
                                        <select class="form-select" id="validationCustom04" name="department" required>
                                        <option selected disabled value="">Choose Department...</option>
                                        <?php   
                                         while($data = mysqli_fetch_assoc($op)) { ?>
                                        <option value="<?php echo $data ['id']; ?>" > <?php echo $data['name']; ?></option>    
                                        <?php
                                         } ?>
                                        </select>
                                        <div class="invalid-feedback">
                                        Please select a valid state.
                                        </div>
                                    </div>


                                    <div >
                                        <br><br><br>
                                    </div>

                                    <div class="col-md-12" class="single_input">
                                            <input type="file" name="image">
                                        </div>
                                    </div>

                                    <div >
                                        <br>
                                        
                                    </div>



                                    <div class="col-md-12">
                                        <div class="single_input">
                                            <textarea cols="30" name="content" placeholder="Write an Application" rows="10"></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                        <label class="form-check-label" for="invalidCheck">
                                            Agree to terms and conditions
                                        </label>
                                        <div class="invalid-feedback">
                                            You must agree before submitting.
                                        </div>
                                        </div>
                                    </div>

                                    <div >
                                        <br>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="apply_btn">
                                            <button class="boxed-btn3" type="submit">Apply Now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ latest_coures_area_end -->
</body>

</html>
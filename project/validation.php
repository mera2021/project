<?php
 
$message = [];
$errorflag = 0;
$errorflag1 = 0;

require "connection.php";

$sql = "select * from departments";
$op  = mysqli_query($con,$sql); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


function validation($str){

    return htmlspecialchars(trim(stripslashes($str)));
} 





$fname =validation($_POST['fname']);

$lname =validation($_POST['lname']);

$date =$_POST['date'];

$national =validation($_POST['national']);

$gender =$_POST['gender'];

$school_n =validation($_POST['schooln']);

$grade_per =validation($_POST['gradper']);

$start_y =validation($_POST['starty']);

$grade_y =validation($_POST['grady']);

$phone =validation($_POST['phone']);

$email =validation($_POST['email']);

$user_n =validation($_POST['usern']);

$password =md5($_POST['password']);

$content =validation($_POST['content']);

$department = $_POST['department'];






//validation for first name and last name
function name ($name){

    $arr_name = explode(' ',$name);

global  $errorflag1;
$message1 = [];

        if (count($arr_name) < 2){
            
            $errorflag1 = 1;
            $message1['Name']= 'You Must Enter Your Name Binary';
        }elseif((count($arr_name) > 2)){

             $errorflag1 = 1;
             $message1['Name'] ='You Must Enter Your Name Binary';
        }
        return $message1;
    
}

$errors = name($fname);
if ($errorflag1 == 1){
    foreach( $errors as $key => $er_message){

        echo '*'.$key.':'.$er_message.'<br>';
    }

}
$errors1 = name($lname);
if ($errorflag1 == 1){
    foreach( $errors1 as $key => $er_message){

        echo '*'.$key.':'.$er_message.'<br>';
    }

}



$namePattern = "/^[a-zA-Z\s*]*$/";
$nationalPattern = "/^[a-zA-Z]*$/";
$phonePattern = "/^\d{11}$/";


if(!preg_match($namePattern,$fname)){

    $errorflag = 1;
    $message['First Name'] = 'Invalid FirstName';
}

if(!preg_match($namePattern,$lname)){

    $errorflag = 1;
    $message['Last Name'] = 'Invalid LastName';
}

if(!preg_match($nationalPattern,$national)){

    $errorflag = 1;
    $message['Nationality'] = 'Invalid String';
}

if(!preg_match($namePattern,$school_n)){

    $errorflag = 1;
    $message['School Name'] = 'Invalid String';
}





//validation for number

if(!filter_var ($grade_per,FILTER_VALIDATE_INT)){

    $errorflag = 1;
    $message['Graduation percentage'] = 'Invalid Number';
}


if(!filter_var ($start_y,FILTER_VALIDATE_INT)){

    $errorflag = 1;
    $message['Start Year'] = 'Invalid Number';
}

if(!filter_var ($grade_y,FILTER_VALIDATE_INT)){

    $errorflag = 1;
    $message['Graduation Year'] = 'Invalid Number';
}



if(!preg_match($phonePattern,$phone)){

    $errorflag = 1;
    $message['phone'] = 'Invalid PhoneNumber';
}



//validation for email
$email = filter_var ($email,FILTER_SANITIZE_EMAIL);

    if(!filter_var ($email,FILTER_VALIDATE_EMAIL)){

        $errorflag = 1;
        $message['email'] = 'Invalid Email'.'<br>';
    }



//validation for username
if(strlen($user_n) < 5){

    $errorflag = 1;
    $message['UserName'] = 'You Must Enter More Than 5 letter';

}

 /*      
$arr_usern = str_split($user_n,1);
    $y = count($arr_usern);

    //echo $arr_usern[$y-1];

  
V1
    if((!$arr_usern[$y-1] == 0) || !($arr_usern[$y-1] == 1) || (!$arr_usern[$y-1] == 2) || (!$arr_usern[$y-1] == 3) || (!$arr_usern[$y-1] == 4) || (!$arr_usern[$y-1] == 5) || (!$arr_usern[$y-1] == 6) || (!$arr_usern[$y-1] == 7) || (!$arr_usern[$y-1] == 8) || (!$arr_usern[$y-1] == 9)  ){

        $errorflag = 1;
        $message['User Name'] = 'You Must Enter one number';
    }
  */ 




if(empty(($_FILES['image']))){

    $errorflag = 1;
    $message['image'] = 'Empty image';
}


//validation for image
$fileTmpName = $_FILES['image']['tmp_name'];
$fileName = $_FILES['image']['name'];
$fileSize = $_FILES['image']['size'];
$fileType = $_FILES['image']['type'];



$fileExt = explode('.',$fileName);

$x = count($fileExt);

$extension = strtolower($fileExt[$x-1]);

$imgName = time().$fileExt[0].'.'.$extension;

$allow_ex = array('jpg','png');



if(in_array($extension,$allow_ex)){
$uploadFolder = './upload/';

$destpath = $uploadFolder.$imgName;
    
    if(move_uploaded_file($fileTmpName,$destpath)){

        echo ' Uploaded File';
    }else{

    $errorflag = 1;
    $message['Image'] = 'Error in Upload File';
    }

}else{

    $errorflag = 1;
    $message['Image'] = 'Error in file extension';
}




//if empty
if ( empty($fname) || empty($lname) || empty($date) || empty($national) || empty($gender) || empty($school_n) || empty($grade_per) || empty($start_y) || empty($grade_y) || empty($phone) || empty($email) || empty($user_n) || empty($password) || empty($content) || empty($gender) || empty($department)){

    $errorflag = 1;
    $message['Empty'] = 'You Must Enter Empty Input';
}



if ($errorflag == 1){

    foreach( $message as $key => $err_message){

        echo '*'.$key.':'.$err_message.'<br>';
    }

}
//,dep_id ,prof_id
if($errorflag == 0) {

    $query = "insert into student (first_name ,last_name , date_of_birth ,nationality ,mobile ,email ,secondary_school ,grade_per ,start_year ,grade_year ,gender ,user_name ,password ,image,comment,dep_id) values ('$fname','$lname','$date','$national','$phone','$email','$school_n','$grade_per','$start_y','$grade_y','$gender','$user_n','$password','$imgName','$content','$department')";

        $result = mysqli_query($con,$query);

        $Message="";
        if ($result){

           $Message = 'data insertrd';
        }else{

            $Message = 'error in insert op';
        }
}

        


}













?>













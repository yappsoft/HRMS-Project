<?php
include("dbcon.php");
session_start();
if(isset($_POST['email']) && isset($_POST['password']))
{
// email and password sent from Form
$email = $_POST['email']; 
//Here converting passsword into MD5 encryption. 
$password = $_POST['password']; 



$result=mysqli_query($con,"SELECT * FROM login_tbl WHERE email='$email' and password='$password'");
$count=mysqli_num_rows($result);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
if($count > 0){
// If result matched $username and $password, table row  must be 1 row
$type = $row['user_type'];
if($type == 'employee'){
    echo 'emp';
    
}else if($type == 'superadmin'){
    
    echo 'spradmin';
}else if($type == 'admin'){
echo 'admin';
    
    
}



}else{
    
    echo 'cloud not find email and password';
}

}else{
    
    echo 'server side validation error';
}
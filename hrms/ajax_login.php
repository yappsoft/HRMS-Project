<?php
include("dbcon.php");
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
	$_SESSION['email'] = $row['email'];
	$_SESSION['login_emp_id'] = $row['employee_id'];
	$_SESSION['company_id'] = $row['company_id'];
	$_SESSION['status'] = $row['login_status'];
		$_SESSION['username'] = $row['username'];
	$_SESSION['login_type'] = $row['user_type'];
	
    echo 'emp';
    
}else if($type == 'superadmin'){
    $_SESSION['email'] = $row['email'];
	$_SESSION['status'] = $row['login_status'];
	$_SESSION['username'] = $row['username'];
	$_SESSION['login_type'] = $row['user_type'];
    echo 'spradmin';
}else if($type == 'admin'){
	
	
	$_SESSION['email'] = $row['email'];
	$_SESSION['login_emp_id'] = $row['employee_id'];
	$_SESSION['company_id'] = $row['company_id'];
		$_SESSION['username'] = $row['username'];
	$_SESSION['status'] = $row['login_status'];
	$_SESSION['login_type'] = $row['user_type'];
echo 'admin';
    
    
}



}else{
    
    echo 'cloud not find email and password';
}

}else{
    
    echo 'server side validation error';
}
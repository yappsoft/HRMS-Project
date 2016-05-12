<?php
include_once 'dbcon.php';

if(isset($_GET['pass_key_ver'])){
	$code = $_GET['pass_key_ver'];
	$id = $_GET['result_id'];
$update ="UPDATE `hrms_product`.`companyreg_tbl` SET `is_email_var` = 'active' WHERE `companyreg_tbl`.`verfication_code` = '$code' and `company_id` ='$id'";
$query = mysqli_query($con,$update);

if($query){
	header('location:index.html?email_verified="Email verify successfully"');
}else{
	header('location:index.html?email_verified="invaid code try again "');

}

}else{
	header('location:index.html?email_verified="Ghuspthiye "');
}

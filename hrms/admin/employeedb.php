
<?php
include("../dbcon.php");
//Fetching Values from URL
$first_name2=$_POST['enp_f_name'];
$last_name2=$_POST['enp_l_name'];
$email2=$_POST['emp_email'];
$password2=$_POST['emp_password'];
$education2=$_POST['education'];
$date_of_birth2 = $_POST['dob_day']."-".$_POST['dob_month']."-".$_POST['dob_year'];
$mobile_no2=$_POST['emp_no'];
$alternate_no2=$_POST['emp_alt_no'];
$family_no2=$_POST['emp_family_no'];
$local_address2=$_POST['local_add'];
$permanent_address2=$_POST['emp_par_add'];
$date_of_joining2=$_POST['date_of_joining'];
$account_no2=$_POST['bank_acc_no'];
$ifsc_code2=$_POST['bank_ifsc'];
$bank_name2=$_POST['bank_name'];
$bank_branch_name2=$_POST['bank_branch_name'];
$number_of_leaves2=$_POST['Numbers_Of_Leave'];



//Insert query

$query = "insert into employee_tbl(first_name, last_name, email, password, education, date_of_birth, mobile_no, alternate_no, family_no, local_address, permanent_address  , account_no, ifsc_code, date_of_joining, bank_name, bank_branch_name, number_of_leaves) values ('$first_name2', '$last_name2','$email2','$password2','$education2','$date_of_birth2','$mobile_no2','$alternate_no2','$family_no2','$local_address2','$permanent_address2','$account_no2','$ifsc_code2','$date_of_joining2','$bank_name2','$bank_branch_name2','$number_of_leaves2')";

$result = mysqli_query($con,$query);
mysqli_close($con); // Connection Closed
?>
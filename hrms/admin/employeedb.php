
<?php
include("../dbcon.php");
//Fetching Values from URL
$company_id = $_SESSION['company_id'];
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
$com_emp_id2=$_POST['employee_id'];
$department2=$_POST['department'];
$image2 = '';
if($_FILES['image']['name']!='') {
   $s = $_FILES['image']['tmp_name'];
   $d = "upload_images/".$_FILES['image']['name'];
   $image2 =$_FILES['image']['name'];
   move_uploaded_file($s, $d);
}


//Insert query

$query = mysqli_query($con,"insert into employee_tbl(company_id,com_emp_id,first_name,last_name, email, password, education, date_of_birth, mobile_no, alternate_no, family_no, local_address, permanent_address, image, account_no, ifsc_code, date_of_joining, bank_name, bank_branch_name, number_of_leaves,department) values ('$company_id','$com_emp_id2','$first_name2','$last_name2','$email2','$password2','$education2','$date_of_birth2','$mobile_no2','$alternate_no2','$family_no2','$local_address2','$permanent_address2','$image2','$account_no2','$ifsc_code2','$date_of_joining2','$bank_name2','$bank_branch_name2','$number_of_leaves2','$department2')");
echo $query;
$id_emp = $con->insert_id;
if($query){
$q1="insert into login_tbl(employee_id,email,password,company_id,login_status,user_type)values('$id_emp','$email2','$password2','$company_id','active','employee')";
echo $q1;
$obj = mysqli_query($con,$q1);
if($obj){
    echo "Details are saved";
}else{
    echo "error while add";
}




}else{
    
    echo "please try after some time";
}
?>
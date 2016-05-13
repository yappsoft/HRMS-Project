<?php
include '../dbcon.php';
 $com_id = $_POST['uniqe_id'];
 $com_name = $_POST['company_name'];
 $com_email = $_POST['company_email'];
 $com_contact = $_POST['company_contact'];
 $number_of_employee = $_POST['num_of_emp'];
 $com_password = $_POST['company_password'];

 $img= '';
if(isset($_FILES['company_img']['name'])){
    
    $img = $_FILES['company_img']['name'];
    $s = $_FILES['company_img']['tmp_name'];
    $d = "../uploads_images/".$_FILES['company_img']['name'];
    move_upload_file($s,$d);
    
    
}
 
 
$sql = "UPDATE `companyreg_tbl` SET company_name='$com_name',company_email='$com_email',holiday_contact='$com_contact',number_of_employee='$number_of_employee',company_password='$com_password',company_img='$img' WHERE company_id = $com_id ";
$result = mysqli_query($con , $sql);
if($result)
{
    echo "successfull"; 
}
?>
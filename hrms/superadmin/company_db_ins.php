<?php
include_once 'dbcon.php';
date_default_timezone_set("Asia/Kolkata");
//check if mail already Register or not
if(!empty($_POST["check_email"])) {
	$ch_email = $_POST['check_email'];
$sel = "select * from companyreg_tbl where `company_email` = '$ch_email'";
$obj = mysqli_query($con,$sel);
$row =mysqli_fetch_row($obj);
$user_count = $row[0];
if($user_count>0){

echo "true";
}else{
	echo 'false';

}
}else{

// insert data in tble







 $com_name = $_POST['com_name'];
 $com_email = $_POST['com_email'];
 $com_password = $_POST['com_password'];
 $com_cof_password = $_POST['com_cof_password'];
 $com_contact = $_POST['com_no'];
 $com_emp = $_POST['com_emp'];
 $com_country = $_POST['com_country'];
 $com_status = $_POST['com_status'];

$confirm_code=md5(uniqid(rand()));
$add_date = date("Y-m-d H:i:s");
 if($com_name && $com_email != ''){

	 $query = mysqli_query($con,"INSERT INTO `hrms_product`.`companyreg_tbl` (`country_id`, `company_name`, `company_email`, `company_password`, `company_contact`, `number_of_employee`, `company_plan`, `registration_date`, `is_email_var`, `subscription_date`, `company_status`,`verfication_code`) VALUES
   ('$com_country', '$com_name', '$com_email', '$com_password', '$com_contact', '$com_emp', 'Free', '$add_date', 'inactive', '$add_date', '$com_status','$confirm_code')");
$id_com = $con->insert_id;

      if($query){
				$date_log =  date("Y-m-d H:i:s");
				//insert into login table after insert into company table
        $ins_log = mysqli_query($con,"INSERT INTO `hrms_product`.`login_tbl` (`employee_id`, `company_id`, `username`, `email`, `password`, `login_status`, `user_type`) VALUES ('', '$id_com', '', '$com_email', '$com_password', 'inactive', 'admin')");
				$ins_notif = mysqli_query($con,"INSERT INTO `hrms_product`.`notification_tbl` (`company_id`, `notif_message`, `notif_type`, `notif_date`) VALUES ('$id_com', 'a $com_name has send request for account register', 'user request', '$date_log')");
				///insert in notification table //


			  require('phpmailer/class.phpmailer.php');
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = TRUE;
        $mail->SMTPSecure = "tls";
        $mail->Port     = 587;
        $mail->Username = "info@yappsoft.com";
        $mail->Password = "#InfoDept@2016";
        $mail->Host     = "smtp.1and1.com";
        $mail->Mailer   = "smtp";
        $mail->SetFrom("info@hrms.com",'HRMS Verfication');

        $mail->AddAddress($_POST['com_email']);
          $mail->Subject = "YAPPHRMS  Verfication - No replay";
        $mail->WordWrap   = 80;
        $mail->MsgHTML('Hello '.$com_name.' <br /> Thanks for register with us. Kindly verify your account on clicking this link <a href="http://localhost/hrms/confirm_email.php?pass_key_ver='.$confirm_code.'&result_id='.$id_com.'"/>http://localhost/hrms/confirm_email.php?pass_key_ver='.$confirm_code.'</a><br />Support <br /> HRMS Team');
        $mail->IsHTML(true);
        $mail->IsHTML(true);
if(!$mail->Send()) {

        echo "Thanks for Register with us , Kindly check your email for verify your account";

}else{

 echo "Thanks for Register with us , Kindly check your email for verify your account";
}
      }else{
        echo "some thing goes worng";

      }



 }else{
   echo "server side validation failed";
 }
}

if(isset($_POST['com_email_u']))
 $com_name_u = $_POST['com_name_u'];
    $company_id_u=$_post['companyid_u'];
 $com_password_u = $_POST['com_password_u'];
 $com_cof_password_u = $_POST['com_cof_password_u'];
 $com_contact_u = $_POST['com_no_u'];
 $com_emp_u = $_POST['com_emp_u'];
 $com_country_u = $_POST['com_country_u'];
 $com_status_u = $_POST['com_status_u'];
 
 $query= "update companyreg_tbl set country_id=$com_country_u,company_name='$com_name_u`,company_password ='$com_password_u` ,company_contact=`$com_contact_u',number_of_employee=`$com_emp_u',company_status='$com_status_u' where company_id=$company_id_u";
$rs=mysqli_query($conn, $query);
if($rs){
    
    echo "Update successfull";
    
}
else{
    echo 'record not update';
}

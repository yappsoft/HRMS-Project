<?php
include_once 'dbcon.php';
//check if mail already Register or not
if(!empty($_POST["check_email"])) {
	$ch_email = $_POST['check_email'];
$sel = "select * from companyreg_tbl where `company_email` = '$ch_email'";
$obj = mysqli_query($con,$sel);
$row =mysqli_fetch_row($obj);
$user_count = $row[0];
if($user_count>0) echo "Email already Register with us";

}else{

// insert data in tble







 $com_name = $_POST['com_name'];
 $com_email = $_POST['com_email'];
 $com_password = $_POST['com_password'];
 $com_cof_password = $_POST['com_cof_password'];
 $com_contact = $_POST['com_no'];
 $com_emp = $_POST['com_emp'];
 $com_country = $_POST['com_country'];
$confirm_code=md5(uniqid(rand()));
$add_date = date('d-m-Y');
 if($com_name && $com_email != ''){

	 $ins = "INSERT INTO `hrms_product`.`companyreg_tbl` (`country_id`, `company_name`, `company_email`, `company_password`, `company_contact`, `number_of_employee`, `company_plan`, `registration_date`, `is_email_var`, `subscription_date`, `company_status`,`verfication_code`) VALUES
   ('$com_country', '$com_name', '$com_email', '$com_password', '$com_contact', '$com_emp', 'Free', '$add_date', 'inactive', '$add_date', 'inactive','$confirm_code')";
      $query = mysqli_query($con,$ins);
	  //printf("Last inserted record has id %d\n", mysqli_insert_id($ins));
//var_dump($ins);
      if($query){

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
        $mail->MsgHTML('Hello '.$com_name.' <br /> Thank for register with us. click on this link to verify email <a href="http://localhost/hrms/confirm_email.php?pass_key_ver='.$confirm_code.'"/>http://localhost/hrms/confirm_email.php?pass_key_ver='.$confirm_code.'</a>');
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

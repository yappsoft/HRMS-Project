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
}
if(!empty($_POST["check_name"])) {
	$ch_name = $_POST['check_name'];
$sel = "select * from companyreg_tbl where `company_name` = '$ch_name'";
$obj = mysqli_query($con,$sel);
$row =mysqli_fetch_row($obj);
$user_count = $row[0];
if($user_count>0){

echo "true";
}else{
	echo 'false';

}
}

if(isset($_POST['com_name'])){
	

// insert data in tble







 $com_name = $_POST['com_name'];
 $com_email = $_POST['com_email'];
 $com_password = $_POST['com_password'];
 $com_cof_password = $_POST['com_cof_password'];
 $com_contact = $_POST['com_no'];
 $com_emp = $_POST['com_emp'];
 $com_country = $_POST['com_country'];
 $com_status = $_POST['com_status'];
$com_username = $_POST['com_username'];
$confirm_code=md5(uniqid(rand()));
$add_date = date("Y-m-d H:i:s");
 if($com_name && $com_email != ''){

	 $query = mysqli_query($con,"INSERT INTO `hrms_product`.`companyreg_tbl` (`country_id`, `company_name`, `company_email`, `company_password`, `company_contact`, `number_of_employee`, `company_plan`, `registration_date`, `is_email_var`, `subscription_date`, `company_status`,`verfication_code`) VALUES
   ('$com_country', '$com_name', '$com_email', '$com_password', '$com_contact', '$com_emp', 'Free', '$add_date', 'inactive', '$add_date', '$com_status','$confirm_code')");
$id_com = $con->insert_id;

      if($query){
				$date_log =  date("Y-m-d H:i:s");
				//insert into login table after insert into company table
        $ins_log = mysqli_query($con,"INSERT INTO `hrms_product`.`login_tbl` (`employee_id`, `company_id`, `username`, `email`, `password`, `login_status`, `user_type`) VALUES ('', '$id_com', '$com_username', '$com_email', '$com_password', 'inactive', 'admin')");
				$ins_notif = mysqli_query($con,"INSERT INTO `hrms_product`.`notification_tbl` (`company_id`, `notif_message`, `notif_type`, `notif_date`) VALUES ('$id_com', '$com_name has send request for account register', 'user request', '$date_log')");
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
        $mail->SetFrom("info@hrms.com",'HRMS Support');

        $mail->AddAddress($_POST['com_email']);
          $mail->Subject = "HRMS Support";

        $mail->MsgHTML('
			<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
    <style>
    html,body{

   
font-weight: normal;
    }
.mainhead{
    text-align: center;
    font-weight: 100 !important;
    font-size: 36px;
    color: #fff;
}
.title-text{

  text-align: center;
  color: #fff;
  text-transform: uppercase;
  font-size: 18px;
  letter-spacing: 2px;

}
.content-section{

  background-color: rgb(131, 175, 154);
  height: 300px;
  border-radius: 5px;
  margin-top: 50px;
}
p.head-text{
  text-align: left;
  font-family: Helvetica, Arial, sans-serif;
  font-size: 18px;
  color: #fff;
  padding-top: 20px;
  line-height: 30px;
  font-weight: 100;
}
    </style>
  </head>
  <body style="background-image: url(http://localhost/hrms/images/email_bg.jpg);">
<br />
    <div class="container">
      <table width="600" border="0" cellpadding="0" cellspacing="0" align="center"  bgcolor="#354052" style="border-top-left-radius: 5px; border-top-right-radius: 5px; background-color: #354052;">
							<tbody><tr>
								<td width="600" valign="middle" align="center" class="logo">

									<!-- Header Text -->
									<table width="540" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="">
										<tbody><tr>
											<td width="100%" height="30"></td>
										</tr>
										<tr>
											<td width="100%">
                      <p class="mainhead" style="    font-size: 36px;
    color: #fff;">Welcome to HRMS</p>
                      </td></td>
										</tr>
										<tr>
											<td width="100%" height="30"></td>
										</tr>
									</tbody></table>
								</td>
							</tr>
						</tbody></table>
            <table width="600" border="0" cellpadding="0" cellspacing="0" align="center"   style="-webkit-border-bottom-left-radius: 5px; -moz-border-bottom-left-radius: 5px; border-bottom-left-radius: 5px; -webkit-border-bottom-right-radius: 5px; -moz-border-bottom-right-radius: 5px; border-bottom-right-radius: 5px;">
							<tbody><tr>
								<td width="600" align="center" style="border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; background-color: rgb(255, 255, 255);" >

									<div class="sortable_inner ui-sortable">

									<table width="600" border="0" cellpadding="0" cellspacing="0" align="center"    style="background-color: rgb(255, 255, 255);">
										<tbody><tr>
											<td width="600" valign="middle" align="center">

												<table width="540" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="">
													<tbody><tr>
														<td width="100%" height="30"></td>
													</tr>
												</tbody></table>
											</td>
										</tr>
									</tbody></table>

									<table width="600" border="0" cellpadding="0" cellspacing="0" align="center"    style="background-color: rgb(255, 255, 255);">
										<tbody><tr>
											<td width="600" valign="middle" align="center">

												<table width="540" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="">
													<tbody><tr>
														<td valign="middle" width="100%" style="text-align: left; font-family: Helvetica, Arial, sans-serif; font-size: 23px; color: #3f4345; line-height: 30px; font-weight: 100;" t-style="not6Headline" mc:edit="40" object="text-editable">
															<!--[if !mso]><!--><span style="font-family: "proxima_novathin", Helvetica; font-weight: normal;"><!--<![endif]--><singleline>Hi   '. $com_name.', </singleline><!--[if !mso]><!--></span><!--<![endif]-->
														<div ></div></td>
													</tr>
												</tbody></table>
											</td>
										</tr>
									</tbody>
									<table width="600" border="0" cellpadding="0" cellspacing="0" align="center"    style="background-color: rgb(255, 255, 255);">
										<tbody><tr>
											<td width="600" valign="middle" align="center">

												<table width="540" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="">
													<tbody><tr>
														<td width="100%" height="30"></td>
													</tr>
												</tbody></table>
											</td>
										</tr>
									</tbody></table>

									<table width="600" border="0" cellpadding="0" cellspacing="0" align="center"    style="background-color: rgb(255, 255, 255);">
										<tbody><tr>
											<td width="600" valign="middle" align="center">

												<table width="540" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="">
													<tbody><tr>
														<td valign="middle" width="100%" style="text-align: left; font-family: Helvetica, Arial, sans-serif; font-size: 14px; color: #3f4345; line-height: 24px;" >
															<!--[if !mso]><!--><span style="font-family: "proxima_nova_rgregular, Helvetica; font-weight: normal;"><!--<![endif]--><singleline>
                                Thank for using HRMS.
                                Your email address "'.$com_email.'" has been associated with a The HRMS account. Click the following button  to confirm account.

                              </singleline><!--[if !mso]><!--></span><!--<![endif]-->
														</td>
													</tr>
												</tbody></table>
											</td>
										</tr>
									</tbody></table>

									<table width="600" border="0" cellpadding="0" cellspacing="0" align="center"    style="background-color: rgb(255, 255, 255);">
										<tbody><tr>
											<td width="600" valign="middle" align="center">

												<table width="540" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="">
													<tbody><tr>
														<td width="100%" height="40"></td>
													</tr>
												</tbody></table>
											</td>
										</tr>
									</tbody></table>

									<!----------------- Button Center ----------------->
									<table width="600" border="0" cellpadding="0" cellspacing="0" align="center"    style="background-color: rgb(255, 255, 255);">
										<tbody><tr>
											<td width="600" valign="middle" align="center">

												<table width="540" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="">
													<tbody><tr>
														<td>
															<table border="0" cellpadding="0" cellspacing="0" align="left">
																<tbody><tr>
																	<td align="center" colspan="2"height="45" style="width:3%;border-radius: 5px; padding-right: 30px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; color: rgb(255, 255, 255); background-color: #8cc63e;" >

																			<a href="http://localhost/hrms/confirm_email.php?pass_key_ver='.$confirm_code.'&result_id='.$id_com.' style="color: #ffffff; font-size:15px; text-decoration: none; line-height:34px; width:100%;">Verify now</a>
																		<!--[if !mso]><!--></span><!--<![endif]-->
																	</td>
																</tr>
															</tbody></table>
														</td>
													</tr>
												</tbody></table>
											</td>
										</tr>
									</tbody></table><!----------------- End Button Center ----------------->



									<table width="600" border="0" cellpadding="0" cellspacing="0" align="center"    style="background-color: rgb(255, 255, 255);">
										<tbody><tr>
											<td width="600" valign="middle" align="center">

												<table width="540" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="">
													<tbody><tr>
														<td valign="middle" width="100%" style="text-align: left; font-family: Helvetica, Arial, sans-serif; font-size: 14px; color: #3f4345; line-height: 24px;" t-style="not6Text" mc:edit="43" object="text-editable">
														<br />
													Support
															<br>
														HRMS Team

															</multiline><!--[if !mso]><!--></span><!--<![endif]-->
														</td>
													</tr>
												</tbody></table>
											</td>
										</tr>
									</tbody></table>

									<table width="600" border="0" cellpadding="0" cellspacing="0" align="center"    style="border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; background-color: rgb(255, 255, 255);">
										<tbody><tr>
											<td width="600" valign="middle" align="center" style="-webkit-border-bottom-left-radius: 5px; -moz-border-bottom-left-radius: 5px; border-bottom-left-radius: 5px; -webkit-border-bottom-right-radius: 5px; -moz-border-bottom-right-radius: 5px; border-bottom-right-radius: 5px;">

												<table width="540" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="">
													<tbody><tr>
														<td width="100%" height="50"></td>
													</tr>
												</tbody></table>

											</td>
										</tr>
									</tbody></table>

								</div>
								</td>
							</tr>
						</tbody></table>



    </div>
</body>
</html>');
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

if(isset($_POST['get_counrty'])){
	
	//fetch all country
	$sel_city = mysqli_query($con,"select * from `master_country`");
	if($sel_city){
		while($r_city = mysqli_fetch_assoc($sel_city)){
			
			
			//get all country and push into array
	echo "<option value='".$r_city['country_id']."'>".$r_city['country_name']."</option>";
		
	}
	
}
}
  // backend code for updete user information
if(isset($_POST['uniqe'])){
   // echo $_POST['com_email_u'];
 $com_name_u = $_POST['com_name_u'];
    $company_id_u=$_POST['companyid_u'];
 $com_password_u = $_POST['com_password_u'];
 $com_cof_password_u = $_POST['com_cof_password_u'];
 $com_contact_u = $_POST['com_no_u'];
 $com_emp_u = $_POST['com_emp_u'];
 $com_country_u = $_POST['com_country_u'];
 $com_status_u = $_POST['com_status_u'];
 
 $query= "update companyreg_tbl set country_id=$com_country_u,company_name='$com_name_u',company_password ='$com_password_u' ,company_contact='$com_contact_u',number_of_employee='$com_emp_u',company_status='$com_status_u' where company_id='$company_id_u'";
$rs=mysqli_query($con, $query);
var_dump($rs);
$res=  mysqli_affected_rows($rs);
if($rs){
    
    echo "Update successfull";
    
}
else{
    echo 'record not update';
}
}

if(isset($_POST['email_forget'])){
		$email_check = $_POST['email_forget'];
		
		$sel_email =mysqli_query($con, "select * from login_tbl where `email`='$email_check' limit 1" );
		if($sel_email){
			$r_email = mysqli_fetch_assoc($sel_email);
			
			$forget_email  =$r_email['email'];
			$forget_username  =$r_email['username'];
			$forget_password  =$r_email['password'];
			
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
        $mail->SetFrom("info@hrms.com",'HRMS Support');

        $mail->AddAddress($_POST['email_forget']);
          $mail->Subject = "HRMS Support";
 $mail->MsgHTML('<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
    <style>
    html,body{

      font-family: "proxima_novathin", Helvetica !important;
font-weight: normal;
    }
.mainhead{
    text-align: center;
    font-weight: 100 !important;
    font-size: 36px;
    color: #fff;
}
.title-text{

  text-align: center;
  color: #fff;
  text-transform: uppercase;
  font-size: 18px;
  letter-spacing: 2px;

}
.content-section{

  background-color: rgb(131, 175, 154);
  height: 300px;
  border-radius: 5px;
  margin-top: 50px;
}
p.head-text{
  text-align: left;
  font-family: Helvetica, Arial, sans-serif;
  font-size: 18px;
  color: #fff;
  padding-top: 20px;
  line-height: 30px;
  font-weight: 100;
}
    </style>
  </head>
  <body style="background-image: url(not4_bg_image.jpg);">
<br />
    <div class="container">
      <table width="600" border="0" cellpadding="0" cellspacing="0" align="center"  bgcolor="#354052" style="border-top-left-radius: 5px; border-top-right-radius: 5px; background-color: #354052;">
							<tbody><tr>
								<td width="600" valign="middle" align="center" class="logo">

									<!-- Header Text -->
									<table width="540" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="">
										<tbody><tr>
											<td width="100%" height="30"></td>
										</tr>
										<tr>
											<td width="100%">
                      <p class="mainhead" style="color:#fff; font-size: 36px;">HRMS Login  Details</p>
                      </td></td>
										</tr>
										<tr>
											<td width="100%" height="30"></td>
										</tr>
									</tbody></table>
								</td>
							</tr>
						</tbody></table>
            <table width="600" border="0" cellpadding="0" cellspacing="0" align="center"   style="-webkit-border-bottom-left-radius: 5px; -moz-border-bottom-left-radius: 5px; border-bottom-left-radius: 5px; -webkit-border-bottom-right-radius: 5px; -moz-border-bottom-right-radius: 5px; border-bottom-right-radius: 5px;">
							<tbody><tr>
								<td width="600" align="center" style="border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; background-color: rgb(255, 255, 255);" >

									<div class="sortable_inner ui-sortable">

									<table width="600" border="0" cellpadding="0" cellspacing="0" align="center"    style="background-color: rgb(255, 255, 255);">
										<tbody><tr>
											<td width="600" valign="middle" align="center">

												<table width="540" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="">
													<tbody><tr>
														<td width="100%" height="30"></td>
													</tr>
												</tbody></table>
											</td>
										</tr>
									</tbody></table>

									<table width="600" border="0" cellpadding="0" cellspacing="0" align="center"    style="background-color: rgb(255, 255, 255);">
										<tbody><tr>
											<td width="600" valign="middle" align="center">

												<table width="540" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="">
													<tbody><tr>
															<td valign="middle" width="100%" style="text-align: left; font-family: Helvetica, Arial, sans-serif; font-size: 14px; color: #3f4345; line-height: 24px;" >
															<!--[if !mso]><!--><span style="font-family: "proxima_nova_rgregular", Helvetica; font-weight: normal;"><!--<![endif]--><singleline>
                         <font style="font-family: "proxima_nova_rgregular", Helvetica; font-weight: bold;> Hello </font>
                              </singleline><!--[if !mso]><!--></span><!--<![endif]-->
														</td>
													</tr>
												</tbody></table>
											</td>
										</tr>
									</tbody>
									<table width="600" border="0" cellpadding="0" cellspacing="0" align="center"    style="background-color: rgb(255, 255, 255);">
										<tbody><tr>
											<td width="600" valign="middle" align="center">

												<table width="540" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="">
													<tbody><tr>
														<td width="100%" height="30"></td>
													</tr>
												</tbody></table>
											</td>
										</tr>
									</tbody></table>

									<table width="600" border="0" cellpadding="0" cellspacing="0" align="center"    style="background-color: rgb(255, 255, 255);">
										<tbody><tr>
											<td width="600" valign="middle" align="center">

												<table width="540" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="">
													<tbody><tr>
														<td valign="middle" width="100%" style="text-align: left; font-family: Helvetica, Arial, sans-serif; font-size: 14px; color: #3f4345; line-height: 24px;" >
															<!--[if !mso]><!--><span style="font-family: "proxima_nova_rgregular", Helvetica; font-weight: normal;><!--<![endif]--><singleline>
								Below are your login deatils:
										

                              </singleline><!--[if !mso]><!--></span><!--<![endif]-->
														</td>
																												
													</tr>
													<tr><td>&nbsp;</td></tr>
													<tr>
														<td valign="middle" width="100%" style="text-align: left; font-family: Helvetica, Arial, sans-serif; font-size: 14px; color: #3f4345; line-height: 24px;" >
															<!--[if !mso]><!--><span style="font-family: "proxima_nova_rgregular", Helvetica; font-weight: normal;><!--<![endif]--><singleline>
					           <font style="color:#7AC043"> Username </font>:  '.$forget_email.'
										

                              </singleline><!--[if !mso]><!--></span><!--<![endif]-->
														</td>
													
																												
													</tr>
		<tr>
														<td valign="middle" width="100%" style="text-align: left; font-family: Helvetica, Arial, sans-serif; font-size: 14px; color: #3f4345; line-height: 24px;" >
															<!--[if !mso]><!--><span style="font-family: "proxima_nova_rgregular", Helvetica; font-weight: normal;><!--<![endif]--><singleline>
					             <font style="color:#7AC043">   Password </font>:  '.$forget_password.'
										

                              </singleline><!--[if !mso]><!--></span><!--<![endif]-->
														</td>
																												
													</tr>
												</tbody></table>
											</td>
										</tr>
									</tbody></table>

									
	<table width="600" border="0" cellpadding="0" cellspacing="0" align="center"    style="background-color: rgb(255, 255, 255);">
										<tbody><tr>
											<td width="600" valign="middle" align="center">

												<table width="540" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="">
													<tbody><tr>
														<td valign="middle" width="100%" style="font-weight:bold;text-align: left; font-family: Helvetica, Arial, sans-serif; font-size: 14px; color: #3f4345; line-height: 24px;">
														<br />
													Support
															<br>
														HRMS Team

															</multiline><!--[if !mso]><!--></span><!--<![endif]-->
														</td>
													</tr>
												</tbody></table>
											</td>
										</tr>
									</tbody></table>
									<table width="600" border="0" cellpadding="0" cellspacing="0" align="center"    style="background-color: rgb(255, 255, 255);">
										<tbody><tr>
											<td width="600" valign="middle" align="center">

												<table width="540" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="">
													<tbody><tr>
														<td width="100%" height="40"></td>
													</tr>
												</tbody></table>
											</td>
										</tr>
									</tbody></table>
									<!----------------- Button Center ----------------->
							

									<table width="600" border="0" cellpadding="0" cellspacing="0" align="center"    style="border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; background-color: rgb(255, 255, 255);">
										<tbody><tr>
											<td width="600" valign="middle" align="center" style="-webkit-border-bottom-left-radius: 5px; -moz-border-bottom-left-radius: 5px; border-bottom-left-radius: 5px; -webkit-border-bottom-right-radius: 5px; -moz-border-bottom-right-radius: 5px; border-bottom-right-radius: 5px;">

												<table width="540" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="">
													<tbody><tr>
														<td width="100%" height="50"></td>
													</tr>
												</tbody></table>

											</td>
										</tr>
									</tbody></table>

								</div>
								</td>
							</tr>
						</tbody></table>



    </div>

      </body>
</html>
');
        $mail->IsHTML(true);
if(!$mail->Send()) {
		echo "false";
		}else{
				echo "true";
		}
		}else{
			echo "server error";
		}
		
	
}
if(isset($_POST['check_username'])){
	$u_name = $_POST['check_username'];
	$sel_username =mysqli_query($con, "select * from login_tbl  where `username` ='$u_name'" );
$r_user =mysqli_fetch_row($sel_username);
$user_name = $r_user[0];
if($user_name>0){

echo "true";
}else{
	echo 'false';

}
	
}
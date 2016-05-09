<?php
include_once 'dbcon.php';
 $com_name = $_POST['com_name'];
 $com_email = $_POST['com_email'];
 $com_password = $_POST['com_password'];
 $com_cof_password = $_POST['com_cof_password'];
 $com_contact = $_POST['com_no'];
 $com_emp = $_POST['com_emp'];
 $com_country = $_POST['com_country'];


 if($com_name && $com_email != ''){

	 $ins = "INSERT INTO `hrms_product`.`companyreg_tbl` (`country_id`, `company_name`, `company_email`, `company_password`, `company_contact`, `number_of_employee`, `company_plan`, `registration_date`, `is_email_var`, `subscription_date`, `company_status`) VALUES
   ('$com_country', '$com_name', '$com_email', '$com_password', '$com_contact', '$com_emp', 'Free', 'now()', 'inactive', 'now()', 'inactive')";
      $query = mysqli_query($con,$ins);
	  printf("Last inserted record has id %d\n", mysql_insert_id());
//var_dump($ins);
      if($query){
        echo "Thanks for Register with us , Kindly check your email for verify your account";


      }else{
        echo "some thing goes worng";

      }



 }else{
   echo "server side validation failed";
 }

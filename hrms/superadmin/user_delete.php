<?php
                                                        include '../dbcon.php';
                                                   $company_id=$_GET["company_id"];
                                                  
                                              
                                                  $query="delete from companyreg_tbl where company_id = $company_id ";
                                                 $rs= mysqli_query($con, $query);
                                                if($rs==1)
                                                 {
					            $del_user=mysqli_query($con,"delete from user_tbl where company_id = $company_id ");
						    $del_emp = mysqli_query($con,"delete from employee_tbl where company_id = $company_id ");
													 
                                                     header('location:user_detail.php');
                                                 }
                                                 
                                                 if(isset($_post['com_name_u']))
{
    $com_name_u = $_POST['com_name_u'];
    $company_id_u=$_post['companyid_u'];
 $com_password_u = $_POST['com_password_u'];
 $com_cof_password_u = $_POST['com_cof_password_u'];
 $com_contact_u = $_POST['com_no_u'];
 $com_emp_u = $_POST['com_emp'];
 $com_country_u = $_POST['com_country_u'];
 $com_status_u = $_POST['com_status_u'];
 
 $query= "update companyreg_tbl country_id='$com_country_u`,company_name='$com_name_u`,company_password ='$com_password_u` ,company_contact=`$com_contact_u',number_of_employee=`$com_emp_u',company_status='$com_status_u' where company_id='$company_id_u'";
$rs=mysqli_query($conn, $query);
if($rs){
    
    echo "Update successfull";
    
}
else{
    echo 'record not update';
}

}
                                                  
                                                 ?>
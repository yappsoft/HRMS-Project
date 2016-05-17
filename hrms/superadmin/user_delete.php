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
                                                  
                                                 ?>
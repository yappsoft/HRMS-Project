<?php
                                                   
                                                   $company_id=$_GET["company_id"];
                                                  
                                                   include 'conn.php';
                                                  $query="delete from companyreg_tbl where company_id = $company_id ";
                                                 $rs= mysqli_query($conn, $query);
                                                if($rs==1)
                                                 {
                                                     header('location:user_detail.php');
                                                 }
                                                  
                                                 ?>
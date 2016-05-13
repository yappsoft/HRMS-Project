<?php


    include("../dbcon.php");
    $employee_id = $_GET["employee_id"];
    $q="delete from employee_tbl where employee_id=$employee_id";
   $result= mysqli_query($con,$q);
   if($result==1){
        $del ="delete from login_tbl where employee_id=$employee_id";
          $obj= mysqli_query($con,$del);
    header("location:employee_management.php");
   }
?>

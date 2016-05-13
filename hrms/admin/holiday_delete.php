<?php
include "../dbcon.php";
 $id = $_GET["id"];
$sql = "delete from holiday_tbl where holiday_id = $id";
 $result = mysqli_query($con , $sql);
 if($result){
     header('location:holiday_management.php');
 }
?>

<?php

include "../dbcon.php";
  $id = $_POST['holiday_id'];
   $com_id = $_POST['uniqe_id'];
  $holiday_name = $_POST['holiday_name'];
   $holiday_date = $_POST['holiday_date'];
         $holiday_days = $_POST['holiday_day'];
$sql = "UPDATE `holiday_tbl` SET holiday_name='$holiday_name' ,holiday_date='$holiday_date',holiday_days='$holiday_days' WHERE holiday_id= $id AND company_id = $com_id ";
$result = mysqli_query($con , $sql);
if($result){
echo "Holiday update successfully";
}else{
	
	echo "error while update data";
}
?>



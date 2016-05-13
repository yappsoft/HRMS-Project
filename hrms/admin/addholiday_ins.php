<?php
include '../dbcon.php';
 $uniqe_id = $_POST['uniqe_id'];
$holiday_name = $_POST['holiday_name'];
$holiday_date = $_POST['holiday_date'];
$holiday_days = $_POST['holiday_day'];


$query = "insert into holiday_tbl (company_id,holiday_name,holiday_date,holiday_days) values ('$uniqe_id','$holiday_name','$holiday_date','$holiday_days')";
$result = mysqli_query($con , $query);
//var_dump($query);

if($result){
echo "Holiday add successfully";
}else{
	
	echo "error while add Holiday";
}
?>

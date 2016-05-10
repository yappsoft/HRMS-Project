<?php
$holiday_name = $_POST['holiday_name'];
$holiday_date = $_POST['holiday_date'];
$holiday_days = $_POST['holiday_day'];
include 'dbcon.php';
$query = "insert into holiday_tbl (holiday_name,holiday_date,holiday_days) values('$holiday_name','$holiday_date','$holiday_days')";
$result = mysqli_query($con , $query);
echo true;
?>
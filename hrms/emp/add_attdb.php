<?php 
include '../dbcon.php';

if(isset($_POST['status'])){
	$em_id = $_POST['em_id'];
	$sel = mysqli_query($con,"select * from `attendance_tbl` where employee_id='$em_id' order by employee_id  desc limit 1");
	if($sel ){
		$row = mysqli_fetch_assoc($sel);
		$last_date = $row['attendence_dt'];
		$newdate =  date('d/m/Y', strtotime($last_date));
		echo $newdate;
		
	}
	
}else{
$emp_id = $_POST['emp_id'];
$com_id = $_POST['com_id'];
if($emp_id && $com_id != ''){
	$query =mysqli_query($con,"INSERT INTO `hrms_product`.`attendance_tbl` (`company_id`, `employee_id`, `attendence_dt`, `note_title`) VALUES ('$com_id ', '$emp_id', NOW(), '')");
	if($query){
		echo "true";
		
	}else{
			echo "false";
	}


}else{
	echo "server error";
}
}


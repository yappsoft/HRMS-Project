<?php

include "../dbcon.php";

if(isset($_POST['status_act'])){
 $id = $_POST['com_id'];
$sql = "UPDATE `companyreg_tbl` SET `company_status` = 'active' WHERE `companyreg_tbl`.`company_id` = $id";
$result = mysqli_query($con , $sql);
$sql = "UPDATE `login_tbl` SET `login_status` = 'active' WHERE `login_tbl`.`company_id` = $id";
$result = mysqli_query($con , $sql);
if($sql && $result){
    echo "Approve";
    
}else{
    echo "error while approval";
}
}

if(isset($_POST['status_rej'])){
 $id = $_POST['com_id'];
$sql = "UPDATE `companyreg_tbl` SET `company_status` = 'reject' WHERE `companyreg_tbl`.`company_id` = $id";
$result = mysqli_query($con , $sql);
if($result){
    echo "Reject";
    
}else{
    echo "error while rejected";
}
}
?>

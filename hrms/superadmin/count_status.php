<?php
include_once '../dbcon.php';

$sel = "select count(company_id) as pennding_total from `companyreg_tbl` where `company_plan`='free'";
$query = mysqli_query($con,$sel);
//var_dump($sel);
if($query){
while($row= mysqli_fetch_assoc($query)){

$count_pending =$row['pennding_total'];
echo $count_pending;
}

}

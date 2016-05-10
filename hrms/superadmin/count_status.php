<?php
include_once '../dbcon.php';
header("Content-Type: text/json");

$sel = "select sum(company_plan ='free') as free_total,sum(company_plan ='paid') as paid_total from `companyreg_tbl`";
$query = mysqli_query($con,$sel);
//var_dump($sel);
if($query){
while($row= mysqli_fetch_assoc($query)){

$count_free =$row['free_total'];
$count_paid =$row['paid_total'];
echo json_encode(array('free_total' => $count_free,'paid_total'=>$count_paid));
}

}

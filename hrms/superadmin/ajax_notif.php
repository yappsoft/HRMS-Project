<?php

//Insert query
include("../dbcon.php");

$query = "select * from notification_tbl";
$result = mysqli_query($con,$query);
$json = array();
if($result)
{
    while ($row = mysqli_fetch_array($result))
        {
       
        $notif_type =  $row['notif_type'];
        $notif_msg = $row['notif_message'];
        $notif_date = $row['notif_date'];
         $data = array('msg_type' =>  $notif_type,'notif_msg'=> $notif_msg,'notif_date'=>$notif_date);    
        array_push($json,$data);
        }
     echo json_encode(array('Data'=>$json));
}

mysqli_close($con); // Connection Closed
?>
<?php

//Insert query
include("../dbcon.php");
$query = "select  notif_message, notif_type from notification_tbl";
$result = mysqli_query($con,$query);
if($result)
{
    while ($row = mysqli_fetch_assoc($result))
    {
        echo $row['notif_message'];
        echo $row['notif_type'];
    }
}

mysqli_close($con); // Connection Closed
?>
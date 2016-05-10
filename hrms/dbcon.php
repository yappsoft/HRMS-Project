<?php
$con = mysqli_connect("localhost","root","","hrms_product") or die("error with conncet");
if(!$con){
	
	echo mysqli_errno();
}

<?php
$con = mysqli_connect("localhost","root","","hrms_product") or die("error with conncet");
session_start();
if(!$con){
	
	echo mysqli_errno();
}

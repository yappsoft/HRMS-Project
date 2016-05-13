<?php 
include '../dbcon.php';
session_destroy();
header('location:../index.html');
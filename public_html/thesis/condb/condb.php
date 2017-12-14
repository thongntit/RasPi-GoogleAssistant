<?php
$server_username = "toitulam_thong";
$server_password = "thong46";
$server_host = "mysql06.dotvndns.vn";
$database = 'toitulam_db';
 
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");
?>
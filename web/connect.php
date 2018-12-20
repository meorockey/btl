<?php
$con = mysqli_connect("localhost","root","","music");
mysqli_set_charset($con, 'UTF8');
if(!$con){
    die('Kết nối thất bại'.mysqli_connect_error());
    exit();
}
?>
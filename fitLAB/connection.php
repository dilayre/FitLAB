<?php
$host="localhost";
$username="root";
$pass="";
$dbname="fitlab";

$connection = mysqli_connect($host,$username,"",$dbname);
// veritabanındaki harflerin düzgün gözükmemesi için.
mysqli_set_charset($connection, "UTF8");
//bağlantıyı sorgulamak için
//if($connection){
//echo "bağlantı başarılı.";
 //}
?>
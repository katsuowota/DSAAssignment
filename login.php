<?php
//variables to define data used in other files in order to connect to the database
//it's more secure to have login details in separate file and is also more convenient to use 'include login.php' and its variables
$host="mysql5";
$username="fet14011094";
$password="PDFP22u2";
$database="fet14011094";
$connection = mysql_connect($host,$username,$password,$database);
?>
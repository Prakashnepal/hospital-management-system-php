<?php
error_reporting(0);
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "hospitalmanagementsystem";
$con = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);

if ($con) {
  // echo ("Connection Sucessfull");
} else {
  echo ("Connection Unsucessfull" . mysqli_connect_error());
};

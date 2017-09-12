<?php
include 'config.php';

$host=$config['DB_HOST'];
$user=$config['DB_USERNAME'];
$pass=$config['DB_PASSWORD'];
$dbname=$config['DB_DATABASE'];

$con = mysqli_connect($host,$user,$pass,$dbname);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>

<?php

$connection = [
  'host' => 'files.000webhost.com',
  'user'=> 'quiz--creator',
  'password' => 'Ad7o0omA',
  'database' => 'quiz'
];

$mysqli = new mysqli(
  $connection['host'],
  $connection['user'],
  $connection['password'],
  $connection['database']);

if($mysqli->connect_error){
  die('Error connecting to database  ' . $mysqli->connect_error);
}
?>

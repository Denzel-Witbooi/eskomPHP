<?php

$db['db_host'] = 'localhost';
$db['db_user'] = 'root';
$db['db_pass'] = '';
$db['db_name'] = 'eskom';

foreach ($db as $key => $value) {
  define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER,DB_PASS,DB_NAME);
//Easy way to connect to db
// $connection = mysqli_connect('localhost','root','', 'eskom');
// if ($connection) {
//   echo "We are connected";
// }

?>

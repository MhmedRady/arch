
<?php
// J2!|x-8[6\x/_Nl-
$dsn  = 'mysql:host=localhost;dbname=arch';
$admin = 'M7MED';
$Adminpass = '**01147**';
$option = array(

PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',

);

try {
  $con = new PDO($dsn, $admin, $Adminpass, $option);
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo '';
}

catch(PDOException $e) {
  echo "failed To Con" . $e->getMessage();
}

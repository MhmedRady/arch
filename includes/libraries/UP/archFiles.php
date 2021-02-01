<?php
$PAGE = isset($_GET['upArch'])? $_GET['upArch']: '';

if ($PAGE == "aRchFiles") {

    for ($i=1; $i <11 ; $i++) {
      if ($file == "uPFile_{$i}") {
        echo "uPFile{$i}";
      }
    }

  }
 ?>

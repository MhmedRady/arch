
<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>

    <?php
    $i1 = rand(1,9); $i2 =$i1 + 1; $i3 = $i1 - 1 ; $i4 = $i1  ; $i5 = $i1*$i1;
     $cssVersion = $i1.'.'.$i2.'.'.$i3.'.'.$i4.'.'.$i5; ?>

     <?php date_default_timezone_set("Africa/Cairo"); ?>

    <title><?php echo gettitle() ?></title><link rel="icon"type="image/png" href="<?php titimg(); ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?php  echo $css; ?>font-awesome.min.css">

    <link rel="stylesheet" href="<?php  echo $css; ?>bootstrap.min.css">
    <link rel="stylesheet" href="<?php  echo $css; ?>dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php  echo $css; ?>responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php  echo $css; ?>ui.css">
    <link rel="stylesheet" href="<?php  echo $css; ?>mycss.css?v=<?php echo $cssVersion; ?>">

  </head>

  <div class="spinner-wrapper">
       <div class="spinner">
         <div class="sk-folding-cube">
           <div class="sk-cube1 sk-cube"></div>
           <div class="sk-cube2 sk-cube"></div>
           <div class="sk-cube4 sk-cube"></div>
           <div class="sk-cube3 sk-cube"></div>
         </div>
       </div>
     </div>

  <body>

    <style media="screen">

    .body{
        opacity: 0;
      }

    </style>
    <main class="body">

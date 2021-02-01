
<?php

/*
=========================================
      =========== START ADMIN FUNCTIONS ============
=========================================

/*
  ** TITLE Function
  ** TITLE Function PASGE TITLE IF IS SET USE IT IF NOT ECHO 'Default'
*/

function gettitle(){
  global $pageTitle ;
  if (isset($pageTitle)) {
    // code...
    return $pageTitle;
  } else {
    // code...
    return "Archive";
  }
}

function titimg(){
  global $Titleimg ;
  if (isset($Titleimg)) {
    // code...
    echo $Titleimg;
  } else {
    // code...
    $timg = "layout/images/LOGO/Arch.png";
    if (!empty($timg)||!isset($timg)) {
      echo $timg;
    }else {
      $timg ="../".$timg;
      echo $timg;
    }
  }
}

/**
  // FUNCTION DELETE ALL DirectS
 **/


function xrmdir($dir) {
    $items = scandir($dir);
    foreach ($items as $item) {
        if ($item === '.' || $item === '..') {
            continue;
        }
        $path = $dir.'/'.$item;
        if (is_dir($path)) {
            xrmdir($path);
        } else {
            unlink($path);
        }
    }
    rmdir($dir);
}

/*
  ** Redirect function
  ** Redirect function errpr to index.php
  ** Can change url Direct to any page by set  $ = url
*/
function redirfun($theMsg , $ndata = 1, $url = null, $seconds = 5) {

    if ($url === null) {
      // code...
      $url = 'index.php';
    }elseif ($url == 'M-B') {
      // code...
      $url = '';
    } else {

      if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '') {

        $url = $_SERVER['HTTP_REFERER'] ;

        $link = 'Previous page';

      } else {
        $url = 'start.php' ;

        $link = 'Homepage';
      }

    }

/*
    ** $ndata msg
    ** USE IF NO DATA OR ERROR
*/
    if (!$ndata == 0) {
      // code...
      echo ' <h6> <i class="fa fa-times-circle-o fa-1x" aria-hidden="true"></i> No Data Updated</h6> ' ;

    }

    echo $theMsg;

      echo "<div class='back alert alert-info theMsg'> " . '<i class="fa fa-sign-out aria-hidden="true"></i>' ."    ". "You Will Redirect to  " . $link . "  After $seconds Seconds</div>";

    header("Refresh: $seconds; url=$url");

    exit();

}

/*
  **CHECK IF VALUE INSERTED BEFORE
  ** Functhon to CHECK VALUES In DATABASE
  ** [ Function Accept Parameters ] :
  ** 1- $select = [ Example: user, ITEMS, Categories ]
  ** 2- $from   = The Table To SELECT from [ Example : USERS , ITEMS , Categories ]
  ** 3- $value  =  THE First VALUE OF SELECTED TO CHECK
  ** 4- $And    =  THE SECOND VALUE OF SELECTED TO CHECK
*/

function checkval($select, $from, $WHERE = NULL, $AND = NULL, $value1, $value2=NULL,$value3 = NULL){

  global $con;

  $statement = $con->Prepare("SELECT $select FROM $from $WHERE $AND ");
  if ($value2 == NULL) {
    $statement->execute(array($value1));
  }elseif ($value3 == NULL) {

    $statement->execute(array($value1, $value2));

  }else {

    $statement->execute(array($value1, $value2,$value3));

  }

  $count = $statement->rowCount();

  return $count;

}

/**
  // FUNCTION CHECK EXIST DATA ITEM
 **/

  function cHECKexist($select, $from, $WHERE = NULL, $AND = NULL, $value1, $value2=NULL)
  {
    $count = checkval($select, $from, $WHERE, $AND, $value1, $value2);
    $ret   = $count !== 0 ? TRUE:FALSE;
    return $ret;
  }

 /*****************************************/

/*
  **CHECK ITEMS Function
  ** Functhon to CHECK ITEMS In DATABASE
  ** [ Function Accept Parameters ] :
  ** 1- $select = [ Example: user, ITEMS, Categories ]
  ** 2- $from = The Table To SELECT from [ Example : USERS , ITEMS , Categories ]
  ** 3- $value =  THE VALUE OF SELECT ITEM
*/

function checkItem($select, $from, $value, $And=NULL){

  global $con;

  $statement = $con->Prepare("SELECT $select FROM $from WHERE $select like ? $And");

  $statement->execute(array($value));

  $count = $statement->rowCount();

  return $count;

}

/*   */

/* DASHBOARD page
[ -2- ]
  ** Count Number Of Items Function
  ** CALCULATE Items IN Rows Or DATABASE
  ** 1- CALCULATE USERS IN DATABASE
  *** $table = The Table To Choose from It
  *** $items = The Choose  Items To COUNT
*/

  function countItems($item, $table){

    global $con;

      $stat2 = $con->prepare("SELECT COUNT($item) FROM $table");
      $stat2->execute();
      return $stat2->fetchColumn();

  }

/********/


/* DASHBOARD page

/*
  ** Get Latest Records Function
  ** Function To Get latest Items From DATABASE [ USERS, ITEMS, Comments ]
  ** $select = Field To Select
  ** $table = The Table To CHOOSE from
  ** $order = get name order
  ** $limit = Number of Record To GET from TABLE
*/

function getlast($select, $table, $where = NULL, $order, $limit = 5){

    global $con;

    $stmlast = $con->prepare("SELECT $select FROM $table $where ORDER BY $order DESC LIMIT $limit");

    $stmlast->execute();

    $rows = $stmlast->fetchAll();

    return $rows;

}

/*
[ -1- ]
  ** GET MANY DAYS Function
  *** GET MANY OF DAYS FROM RESGESTED DATE TO TODAY
  **** $where = WHERE UserID = {$row['UserID']} => Date
*/

function datediff($date ,$where, $and = NULL){

  global $con;

   $getdate = $con->prepare("SELECT UserID , DATEDIFF(CURDATE(),$date) AS Added FROM users $where $and ");

   $getdate->execute();

   $All = $getdate->fetchAll();

    return $All;

}

/***********************************************/

/*
  **USE ERROR i for error Msg
  **USE RIGHT i for right Msg
*/

$errori = '<i class="fa fa-times-circle-o fa-1x" aria-hidden="true"></i>' ;

$righti = '<i class="fa fa-check-square-o fa-1x" aria-hidden="true"></i>';
/***************************/

 ?>

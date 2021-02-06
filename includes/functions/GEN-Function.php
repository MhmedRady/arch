<?php

/*
=========================================
=========== GENERAL public static function ============
=========================================

  **CHECK GETALL public static function
  ** Functhon to CHECK ALL FROM ANY DATABASE TABLE
*/

namespace GENFun_Class;

final class Fun_Class {

  public static function getAlltable($name,$tablename, $where = NULL, $and = NULL, $orderby=NULL, $ordering = "DESC", $limit = 0){

    global $con;

    if ($limit !== 0) {
      $LIMIT  = "LIMIT $limit";
      $getAll = $con->prepare("SELECT $name FROM $tablename $where $and ORDER BY $orderby $ordering $LIMIT");
    } else {
      $getAll = $con->prepare("SELECT $name FROM $tablename $where $and ORDER BY $orderby $ordering ");
    }

    //$sql = $where == NULL ? '' : $where ;


    $getAll->execute();

    $All = $getAll->fetchAll();

    return $All;

}

/*  */

/***********************************************/
/*
  **CHECK GETALL public static function
  ** Functhon to CHECK ALL FROM ANY DATABASE TABLE
*/

public static function getVal($name,$tablename, $where = NULL, $and = NULL) {

    global $con;

    $getOne = $con->prepare("SELECT $name FROM $tablename $where $and ");

    $getOne->execute();

    $ONE = $getOne->fetchAll();

    // return $this;

    return $ONE;

}


public static function HashPass($Pass)
{
  $hashPass = hash('sha256', $Pass);
    return $hashPass;
}


/*  */

/*
  **GET ONE VALUE public static function
  ** Functhon to CHECK ALL FROM ANY DATABASE TABLE
*/

public static function getOne($name,$tablename, $where = NULL, $and = NULL,$Val) {

    global $con;

    $getOne = $con->prepare("SELECT $name FROM $tablename $where $and ");

    $getOne->execute(array($Val));

    $ONE = $getOne->fetchAll();

    return $ONE;

}

/*****************************************/

/**
// public static function DELETE UNIT DATABASE
 **/

public static function DeleteData($table,$where,$del)
{

global $con;
$del=$cont->prepare("DELETE FROM $table $where");
$del->bindParam(":zDel",$del);
$del->execute();
$Deleted = $del->rowCount();
return $Deleted;

}


/***********************************************/

/*GET ARRANGE*/
public static function getTid($select, $from, $by, $sort){

  global $con;

      $stmt3 = $con->prepare("SELECT * FROM categories ORDER BY Ordering $sort");

      $stmt3->execute();

      $cats = $stmt3->fetchAll();

      return $cats ;

}

/*
[ -1- ]
  ** Count Number Of UNIT public static function
  ** CALCULATE UNITS IN Row DATABASE
  ** 1- CALCULATE PARENT NUM IN CATEGORIES TABLE IN DATABASE
  *** 2- CAN USE IT FOR CALCULATE NUM OF MEMBERS RESGESTED DateTime [ ' >= 30 ' ]
  **** $from_row = The Col To Choose from It [ 'PARENT IN CATEGORIES' ]
  ***** $table = The Choose TABLE To COUNT FROM IT
  ****** $where = The GET VALUE To COUNT BY IT [ 'WHERE ID = $USR['UserID']' ]
*/

 public static function countof($from_row, $table,$where = NULL, $And=NULL){

     global $con;

        $stat2 = $con->prepare("SELECT COUNT($from_row) FROM $table $where $And");
        $stat2->execute();
        return $stat2->fetchColumn();

  }

/***********************************************/

/*
[ -1- ]
  ** GET MANY DAYS public static function
  *** GET MANY OF DAYS FROM ADDED DATE TO TODAY
  **** $where = WHERE GET = {$row['CHECK']} => Date
  ***** [ 1 ] $select = CHECK NAME OF GET DATE UNIT
  ****** [ 2 ] $date = DATE TO CHECK NOW => [ DATE ] | DATETIME [ 2020/04/15 10:02:47 ]
  ******* [ 3 ] $from = TABLE NAME
  ******** [ 4 ] $where = WHERE CHECK = | !=
  ********* [ 5 ] $and = AND CHECK = | !=
*/

public static function Diff($select,$date ,$from,$where = NULL, $and_1 = NULL,$and_2 = NULL){

  global $con;

   $getdate = $con->prepare("SELECT $select , DATEDIFF(CURDATE(),$date) AS Added,HOUR($date) AS H,MINUTE($date) AS M FROM $from $where $and_1 $and_2 ");

   $getdate->execute();

   $All = $getdate->fetchAll();

    return $All;

}

/***********************************************/

// $stmt = $con->prepare("UPDATE users SET RegStatus = 0, UnRegDate=now() WHERE UserID = ?");
//
// $stmt->execute(array($userid));

public static function update($value1, $value2 = NULL, $from ,$set ,$where = NULL){

  global $con;

  $stmt = $con->prepare("UPDATE $from $set  $where");

  if ($value2 == NULL) {

      $stmt->execute(array($value1));

  }else {

      $stmt->execute(array($value1,$value2));

  }

  $count = $stmt->rowCount();

  return $count;

}

/*****************************************/
/*
[ -1- ]
  ** GET SUM
  *** GET TOTAL NUM OF $SUM
*/

public static function sum($sum,$from,$where=NULL,$and=NULL){
  global $con;
  $stmt = $con->Prepare("SELECT SUM($sum) AS SUM FROM $from $where $and");
  $stmt->execute();
  $stmt = $stmt->fetchAll();
  return $stmt;
}

/*****************************************/

public static function myImplode($value = null,$Cut = null)
{
  return implode(explode($Cut,$value));
}

/**
// public static function GET CLIENT_IP
 **/

public static function getIp() {

  $ip = "REMOTE_ADDR" . $_SERVER['REMOTE_ADDR'];

  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

      $ip = "CLIENT_IP" . $_SERVER['HTTP_CLIENT_IP'];

  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

      $ip = "X_FORWARDED_FOR" . $_SERVER['HTTP_X_FORWARDED_FOR'];

  }

  return $ip;

}


 /*****************************************/


 /**
   // public static function FROEACH ERROR
  **/
  public static function eRRORaLert($ERROR=null)
  {

    foreach ($ERROR as $key => $value) {
      echo '<div class="alert alert-danger myAlert" role="alert">
              '.$value.'
            </div>';
      }

  }
  /*****************************************/

  /**
    // public static function CSRF REQUEST
   **/


 public static function  _CSRF()
 {
   if (empty($_SESSION['key']))
 		$_SESSION['key'] = bin2hex(random_bytes(32));
 	//create CSRF token
 	$csrf = hash_hmac('sha256', 'this is some string: index.php', $_SESSION['key']);
   return $csrf;
 }

/*****************************************/

/**
  // public static function defult FORM INPUT
 **/

 public static function myFormInput($label = "Name",$InputID = "InputName",
  $Helper = "Name",$Place="Place",$inputClass = null, $require = null, $inpuType = "text",$onChange = null, $mask = null,$value=null

 )
    {
      ?>
      <div class="form-group">
        <label for="<?php echo $InputID ?>" class="<?php echo $require ?>"><?php echo $label ?></label>
        <input type="<?php echo $inpuType ?>" <?php echo $require ?> name="<?php echo $InputID ?>" value="<?php echo $value ?>"
        class="form-control <?php echo $inputClass ?>" id="<?php echo $InputID ?>" onchange="<?php echo $onChange ?>"
        aria-describedby="<?php echo $Helper ?>Help" placeholder="<?php echo $Place ?>" <?php $mask = $mask!==null ? 'data-mask="'.$mask.'"' : null; echo $mask; ?>>
        <small id="<?php echo $Helper ?>" class="form-text text-muted error"></small>
      </div>
      <?php
    }

 /*****************************************/

/**
  // public static function TAG CHANGES SETTINGS
 **/

  public static function myModal($title=null,$body=null,$GoBtn=null,$name=null,$val=null,$onClick = null,$GoLink=null)
  {
    $GoLink = $GoLink !==null?'<a href="'. $GoLink .'">'. $GoBtn .'</a>':$GoBtn;

    ?>

        <div class="myModal">

              <!-- Button trigger modal -->
              <button id="phpClick" type="button" class="btn btn-primary clickModel phpModel" data-bs-toggle="modal" data-bs-target="#PhpModel" style="display:none"></button>

              <!-- Modal -->
              <div class="modal fade added" id="PhpModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="PhpModelLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="PhpModelLabel"><?php echo $title ?></h5>
                      <button type="button" class="btn-close btn badge btn-dark ModalClose _Close" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i> </button>
                    </div>
                    <div class="modal-body">
                      <?php echo $body ?>
                    </div>
                    <div class="modal-footer">
                      <?php if ($GoBtn!=null): ?>
                        <button id="ModalGo" type="button" class="btn btn-primary ModalGo" name="<?php echo $name ?>" value="<?php echo $val ?>" onclick="<?php echo $onClick ?>"> <?php echo $GoLink ?> </button>
                      <?php endif; ?>
                      <button type="button" class="btn btn-dark ModalClose" data-bs-dismiss="modal">إلغاء</button>
                    </div>
                  </div>
                </div>
              </div>

        </div>

    <?php
  }

}

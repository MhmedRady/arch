<?php

/*
=========================================
      =========== START ADMIN public static functionS ============
=========================================

/*
  ** TITLE public static function
  ** TITLE public static function PASGE TITLE IF IS SET USE IT IF NOT ECHO 'Default'
*/

namespace MyFun_Class;

  final class Fun_Class {

      public static function gettitle(){
        global $pageTitle ;
        if (isset($pageTitle)) {
          // code...
          return $pageTitle;
        } else {
          // code...
          return "Archive";
        }
      }

      public static function titimg(){
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
        // public static function DELETE ALL DirectS
       **/


      public static function xrmdir($dir) {
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
        **CHECK IF VALUE INSERTED BEFORE
        ** Functhon to CHECK VALUES In DATABASE
        ** [ public static function Accept Parameters ] :
        ** 1- $select = [ Example: user, ITEMS, Categories ]
        ** 2- $from   = The Table To SELECT from [ Example : USERS , ITEMS , Categories ]
        ** 3- $value  =  THE First VALUE OF SELECTED TO CHECK
        ** 4- $And    =  THE SECOND VALUE OF SELECTED TO CHECK
      */

      public static function checkval($select, $from, $WHERE = NULL, $AND = NULL, $value1, $value2=NULL,$value3 = NULL){

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
        // public static function CHECK EXIST DATA ITEM
       **/

        public static function cHECKexist($select, $from, $WHERE = NULL, $AND = NULL, $value1, $value2=NULL)
        {
          $count = SELF::checkval($select, $from, $WHERE, $AND, $value1, $value2);
          $ret   = $count !== 0 ? TRUE:FALSE;
          return $ret;
        }

       /*****************************************/

      /*
        **CHECK ITEMS public static function
        ** Functhon to CHECK ITEMS In DATABASE
        ** [ public static function Accept Parameters ] :
        ** 1- $select = [ Example: user, ITEMS, Categories ]
        ** 2- $from = The Table To SELECT from [ Example : USERS , ITEMS , Categories ]
        ** 3- $value =  THE VALUE OF SELECT ITEM
      */

      public static function checkItem($select, $from, $value, $And=NULL){

        global $con;

        $statement = $con->Prepare("SELECT $select FROM $from WHERE $select like ? $And");

        $statement->execute(array($value));

        $count = $statement->rowCount();

        return $count;

      }

      /*   */

      /* DASHBOARD page
      [ -2- ]
        ** Count Number Of Items public static function
        ** CALCULATE Items IN Rows Or DATABASE
        ** 1- CALCULATE USERS IN DATABASE
        *** $table = The Table To Choose from It
        *** $items = The Choose  Items To COUNT
      */

        public static function countItems($item, $table){

          global $con;

            $stat2 = $con->prepare("SELECT COUNT($item) FROM $table");
            $stat2->execute();
            return $stat2->fetchColumn();

        }

      /********/

        public static function myFilterString($var = null)
          {
            return filter_var($var,FILTER_SANITIZE_STRING);
          }


      /* DASHBOARD page

      /*
        ** Get Latest Records public static function
        ** public static function To Get latest Items From DATABASE [ USERS, ITEMS, Comments ]
        ** $select = Field To Select
        ** $table = The Table To CHOOSE from
        ** $order = get name order
        ** $limit = Number of Record To GET from TABLE
      */

      public static function getlast($select, $table, $where = NULL, $order, $limit = 5){

          global $con;

          $stmlast = $con->prepare("SELECT $select FROM $table $where ORDER BY $order DESC LIMIT $limit");

          $stmlast->execute();

          $rows = $stmlast->fetchAll();

          return $rows;

      }

      /*
      [ -1- ]
        ** GET MANY DAYS public static function
        *** GET MANY OF DAYS FROM RESGESTED DATE TO TODAY
        **** $where = WHERE UserID = {$row['UserID']} => Date
      */

      public static function datediff($date ,$where, $and = NULL){

        global $con;

         $getdate = $con->prepare("SELECT UserID , DATEDIFF(CURDATE(),$date) AS Added FROM users $where $and ");

         $getdate->execute();

         $All = $getdate->fetchAll();

          return $All;

      }

  /***********************************************/

  }

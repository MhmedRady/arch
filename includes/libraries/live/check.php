<?php
ob_start();

include '../../functions/functions.php';
include '../../functions/GEN-Function.php';
include '../../../connect.php';

?>

<script type="text/javascript">

$('body').fadeIn(500);
$('.body').fadeIn(1000);

</script>

<?php
// if (isset($_SESSION['LORDADMIN'])) {

  if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header('location : http://localhost/arch/');
    exit;
  }else {


  $check   = isset($_GET['check']) ? $_GET['check'] = 'Ckc!' : $_GET['check'] ;

              /***************** START CATEGORY SEARCH  *************/
              $data ="../../../data";

    if ($check !== 'Ckc!') :
      header('location :  http://localhost/arch');
      exit;
      else :

        /** ***********************************************
          // START _CHECK CLASS
        *********************************************** **/

        class _CHECK
        {
        public $error = array();
        public $N;
        public $P;
        public $E;
        public $D;
        public $ip;
        public $err = 0;
        const NUM = 12;
        const Qrray = array("[","1","2","3","4","5","6","7","8","9","0","۰", "۱", "۲", "۳", "٤","٥","٦","۸","۹",
         "/","*","!","<",">","(",")",".","-","+","=","÷","{","}","?",":",";","@","#","$","%","^","&","_",".","؟",
         ",","]");

        public function checkempty()
        {
          $ex = str_split($this->N);
          $count = count($ex);
          if (empty($this->N)) {
              array_push($this->error,"لم يتم داخال الأسم");
          }else {
            for ($i=0; $i <$count ; $i++) {
              if (in_array($ex[$i],SELF::Qrray) || is_numeric($ex[$i])) {
                $this->err = 1;
              }
            }
            if ($this->err==1) {
              array_push($this->error,"برجاء ادخال الاسم بشكل صحيح");
            }
          }

          if ( empty($this->P)) {
              array_push($this->error,"لم يتم ادخال رقم الهاتف");

          }elseif (strlen($this->P) !==SELF::NUM) {
            array_push($this->error,"رقم الهاتف الذي ادخلته غير صحيح ");
          }
          if (empty($this->E)) {
              array_push($this->error,"برجاء ادخال البريد الالكتروني");
          }
          if (empty($this->D)) {
              array_push($this->error,"في عبارات بسيطه ادخل استفسارك حتي نتمكن من تقديم المساعدة !");
          }
        }
        public function _CHECK1($xsr,$select,$from,$val,$and=NULL,$cmsg)
        {
          $XSRF = _CSRF();
          $IP   = $this->ip;
          $csrf = strlen($xsr);
          $XSRF = strlen($XSRF);
          $A = checkItem($select, $from, $val, $and);
          // if ($A !== 0) {
            if ($csrf!==$XSRF) {
              global $con;
              $cmsg = "البيانات المدخلة غير صحيحة برجاء ادخال البيانات بشكل صحيح !";
              if ($A == 0) {
                $msg = $con->prepare("INSERT INTO msg(IP,Block,Date)
                VALUES(:zip,:zB,now())");
                $msg->execute(array('zip'=>$IP,'zB'=>1));
                $datarow = $msg->rowCount();
              }
              array_push($this->error,$cmsg);
            } else {
              if($A !== 0){
                $B = checkItem($select, $from, $val, 'AND Block = 1');
                if ($B !== 0 ) {
                  $cmsg = "لا يمكن ارسال هذه الرسالة برجاء المحاولة في وقت لاحق .";
                }
                array_push($this->error,$cmsg);
              }
          }

          }
        // }

        }

        /** ***********************************************
          // END _CHECK CLASS
        *********************************************** **/

      $page = !isset($_GET['page']) ? $_GET['page'] = 'check' : $_GET['page'];

    if (isset($page) && $page == 'addComp'){

      $Name = $_POST['CompName'];
      $own  = $_POST['ownName'];
      $TCard = $_POST['TaxCardNum'];
      $TFile = $_POST['FileTaxNum'];
      $amin = $_POST['aminName'];
      $IndexNum = $_POST['IndexNum'];
      $SetDate = $_POST["IndexDate"];
      $CapNum = $_POST['CompCapitelNum'];
      $CapLang = $_POST['CompCapitellang'];
      $ownarr = $_POST['ownarrCount'];
      $Mokt = $_POST['ownrsMokt'];
      $address = $_POST['address'];
      $Email = $_POST['CompEmail'];
      $Phone1 = $_POST['CompPhoneNum1'];
      $Phone2 = $_POST['CompPhoneNum2'];

      $ID_1 = $_POST['id_img_1'];
      $ID_2 = $_POST['id_img_2'];

      function myFilterString($var = null)
      {
        return filter_var($var,FILTER_SANITIZE_STRING);
      }
      $Name = myFilterString($Name);
      $own = myFilterString($own);
      $IndexNum = myFilterString($IndexNum);
      $SetDate  = myFilterString($SetDate);
      $TCard = myFilterString($TCard);
      $TFile = myFilterString($TFile);
      $amin = myFilterString($amin);
      $CapNum  = myFilterString($CapNum);
      $CapLang  = myFilterString($CapLang);
      $ownarr  = myFilterString($ownarr);
      $Mokt  = myFilterString($Mokt);
      $address  = myFilterString($address);
      $Phone1  = myFilterString($Phone1);
      $Phone2  = myFilterString($Phone2);
      $ID_1  = myFilterString($ID_1);
      $ID_2  = myFilterString($ID_2);



      // $Name
      // $own
      // $IndexNum
      // $SetDate
      // $TCard
      // $TFile
      // $amin
      // $CapNum
      // $CapLang
      // $ownarr
      // $Mokt
      // $address
      // $Phone1
      // $Phone2
      // $ID_1
      // $ID_2

      $Phone1 = GENFun_Class\Fun_Class::myImplode($Phone1,"-");
      $Phone2 = GENFun_Class\Fun_Class::myImplode($Phone2,"-");


      $Email = filter_var($Email,FILTER_SANITIZE_EMAIL);

      if (isset($ID_1) && !empty($ID_1)) {
        $ID_1_split = explode(".",$ID_1);
        $ID_1_type = end($ID_1_split);
      }

      if (isset($ID_2) && !empty($ID_2)) {
        $ID_2_split = explode(".",$ID_2);
        $ID_2_type = $ID_2_split[count($ID_2_split)-1];
      }

      // GET LIST OF ALLOWED FILE UPLODE TYPES

      $imgAllowExtension = array("jpeg", "jpg", "png","JPEG", "JPG", "PNG");

      // GET VARIABLE FROM FORMS

      $ERRORS = array();

      if (empty($ID_1) || empty($ID_2)) {
        $ERRORS[] = "لم يتم رفع صور البطاقة الشخصية ";
      }elseif(!in_array($ID_1_type,$imgAllowExtension)||!in_array($ID_2_type,$imgAllowExtension)){
        $ERRORS[] = 'امتداد الملف غير معرف يجب استخدام ملفات' . '  <strong > "jpeg" , "jpg" , "png" </strong>';
      }

      if (empty($Name) || !isset($Name)) {
        $ERRORS[]="لم يتم اخال اسم الشركة";
      }else {
        $NamerowCount = cHECKexist("ID","stocks","WHERE Name LIKE ?","",$Name);
        if ($NamerowCount) {
          $getINdxNum = GENFun_Class\Fun_Class::getOne("IndexNum","stocks","WHERE Name LIKE ?","",$Name);
          $GetIndex = $getINdxNum[0]["IndexNum"];
          $ERRORS[] = "هذه الشركة مسجلة من قبل وبرقم سجل تجاري => <strong class='text-dec'> {$GetIndex} </strong>";
        }
      }

      if (empty($own) || !isset($own)) {
        $ERRORS[]="لم يتم اخال اسم رئيس مجلس ادارة الشركة";
      }

      if (empty($amin) || !isset($amin)) {
        $ERRORS[]="لم يتم اخال اسم امين سر الشركة";
      }

      if (empty($TCard) || !isset($TCard)) {
        $ERRORS[]="لم يتم اخال رقم البطاقة الضريبية";
      }if (strlen($TCard)!=11) {
        $ERRORS[]="رقم البطاقة الضريبية غير صحيح ";
      }else {
        $TCardrowCount = cHECKexist("ID","stocks","WHERE TaxCard LIKE ?","",$TCard);
        if ($TCardrowCount) {
          $getTName = GENFun_Class\Fun_Class::getOne("Name","stocks","WHERE TaxCard LIKE ?","",$TCard);
          $getTName = $getTName[0]["Name"];
          $ERRORS[] = "رقم البطاقة الضريبية مسجل من قبل لدي شركة => <strong class='text-dec'> {$getTName} </strong>";
        }
      }


      if (empty($TFile) || !isset($TFile)) {
        $ERRORS[]="لم يتم ادخال رفم الملف الضريبي";
      }if (strlen($TFile)!=21) {
        $ERRORS[]="رقم الملف الضريبي غير صحيح";
      }else{
        $TFilerowCount = cHECKexist("ID","stocks","WHERE TaxFile LIKE ?","",$TFile);

        if ($TFilerowCount) {
          $getTFName = GENFun_Class\Fun_Class::getOne("Name","stocks","WHERE TaxFile LIKE ?","",$TFile);
          $getTFName = $getTFName[0]["Name"];
          print_r($TFilerowCount);
          $ERRORS[] = "رقم الملف الضريبي مستخد من قبل لركة => <strong class='text-dec'> {$getTFName} </strong>";
        }
      }

      if (empty($IndexNum) || !isset($IndexNum)) {
        $ERRORS[]="لم يتم اخال رقم السجل اتجاري";
      }else {
        $IndxNumrowCount = cHECKexist("ID","stocks","WHERE IndexNum LIKE ?","",$IndexNum);
          if ($IndxNumrowCount) {
            $getINdxNum = GENFun_Class\Fun_Class::getOne("Name","stocks","WHERE IndexNum LIKE ?","",$IndexNum);
            $DName = $getINdxNum[0]["Name"];
            $ERRORS[] = "رقم السجل هذا مستخدم من قبل لشركة => <strong class='text-dec'> {$DName} </strong>";
          }
        }

      if (empty($SetDate) || !isset($SetDate)) {
        $ERRORS[]="قم بحديد تاريخ تسجيل الشركة";
      }

      if (empty($CapNum) || !isset($CapNum)) {
        $ERRORS[]="لم يتم تحديد راس مال الشركة";
      }

      if (is_numeric($CapLang)) {
        $ERRORS[]="لا يمكن استخدام صيقة رقميه في هذا المحنوي";
      }

      if (empty($ownarr) || !isset($ownarr)) {
        $ERRORS[]="لم يتم تحديد عدد المساهمين لشركة";
      }

      if (empty($address) || !isset($address)) {
        $ERRORS[]="لم يتم ادخال عنوان  لمقر الشركة";
      }

      if (empty($Phone1) || !isset($Phone1)) {
        $ERRORS[] = "لم يتم ادخال رقم الهاتف الاول";
      }elseif(strlen($Phone1)!=11) {
        $ERRORS[] = "رقم الهاتف الاول غير صحيح ";
      }

      if (!empty($Phone2)) {
        if(strlen($Phone2)!=11) {
          $ERRORS[] = "رقم الهاتف الثاني غير صحيح";
        }
      }

      if (!empty($ERRORS)) {
      ?>
      <div class="myModal">

            <!-- Button trigger modal -->
            <button id="ShowERRor" type="button" class="btn btn-primary clickModel" data-bs-toggle="modal" data-bs-target="#SetERRor" style="display:none"></button>

            <!-- Modal -->
            <div class="modal fade" id="SetERRor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><?php echo "اضافة شركة جديدة"; ?></h5>
                    <button type="button" class="btn-close btn badge btn-dark ModalClose _Close" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i> </button>
                  </div>
                  <div class="modal-body">
                    <?php foreach ($ERRORS as $key => $value): ?>
                      <div class="alert alert-danger myAlert" role="alert">
                        <?php echo $value; ?>
                      </div>
                    <?php endforeach; ?>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-dark ModalClose" data-bs-dismiss="modal">إلغاء</button>
                  </div>
                </div>
              </div>
            </div>

      </div>

      <script type="text/javascript">
        $("#ShowERRor").click();
      </script>

      <?php
    }else {
      if (!is_dir($data)) {
          mkdir($data,0700);
          mkdir($data."/شركات المساهمة",0700);
          mkdir($data."/شركات المساهمة"."/{$Name}",0700);
          mkdir($data."/شركات المساهمة"."/{$Name}/البطاقة الشخصية",0700);
          mkdir($data."/شركات المساهمة"."/{$Name}/الارشيف",0700);
          echo "data no";
      }else if (!is_dir($data."/شركات المساهمة")) {
        mkdir($data."/شركات المساهمة");
        mkdir($data."/شركات المساهمة"."/{$Name}",0700);
        mkdir($data."/شركات المساهمة"."/{$Name}/البطاقة الشخصية",0700);
        mkdir($data."/شركات المساهمة"."/{$Name}/الارشيف",0700);
        echo "stocks no";
      }elseif (!is_dir($data."/شركات المساهمة"."/{$Name}")) {
        mkdir($data."/شركات المساهمة"."/{$Name}",0700);
        mkdir($data."/شركات المساهمة"."/{$Name}/البطاقة الشخصية",0700);
        mkdir($data."/شركات المساهمة"."/{$Name}/الارشيف",0700);
        echo "company no";
      }elseif (!is_dir($data."/شركات المساهمة"."/{$Name}/الارشيف") || !is_dir($data."/شركات المساهمة"."/{$Name}/البطاقة الشخصية")) {
        @mkdir($data."/شركات المساهمة"."/{$Name}/البطاقة الشخصية",0700);
        @mkdir($data."/شركات المساهمة"."/{$Name}/الارشيف",0700);
        echo "arch no";
      }


      $img_1_P = "../UP/upload/ownID_1";
      $img_2_P = "../UP/upload/ownID_2";

      $scan_1 = scandir($img_1_P,SCANDIR_SORT_NONE);
      $scan_2 = scandir($img_2_P,SCANDIR_SORT_NONE);

      if (count($scan_1)>2) {
        $img1 = $scan_1[2];
        // rename();
      }
      if (count($scan_2)>2) {
        $img2 = $scan_2[2];
      }

      @rename($img_1_P."/".$img1,"..\..\..\data\شركات المساهمة"."\\".$Name."\البطاقة الشخصية\\".$img1);
      @rename($img_2_P."/".$img2,"..\..\..\data\شركات المساهمة"."\\".$Name."\البطاقة الشخصية\\".$img2);

      if (is_dir("../UP/upload/Arch_files")) {

          for ($i=1; $i < 11; $i++) {
            if (is_dir("../UP/upload/Arch_files/File_{$i}")) {
              $FILE = "../UP/upload/Arch_files/File_{$i}";
              $scanArch = scandir($FILE,SCANDIR_SORT_NONE);
              if (count($scanArch)>2) {

                $afile = $scanArch[2];
                @rename($FILE."/".$afile,"..\..\..\data\شركات المساهمة"."\\".$Name."\الارشيف\\".$afile);
              }
           }
        }
      }

// echo
//             $Name."<br/>".
//             $own."<br/>".
//             $IndexNum."<br/>".
//             $SetDate."<br/>".
//             $TCard."<br/>".
//             $TFile."<br/>".
//             $amin."<br/>".
//             $CapNum."<br/>".
//             $CapLang."<br/>".
//             $ownarr."<br/>".
//             $Mokt."<br/>".
//             $address."<br/>".
//             $Email."<br/>".
//             $Phone1."<br/>".
//             $Phone2."<br/>".
//             $img1."<br/>".
//             $img2
// ;

      $set=$con->Prepare("INSERT INTO stocks(Name,CEO,ASO,TaxCard,TaxFile,IndexNum,SetDate,Capital,CapitalLang,Stockrs,Revers,Address,Email,Phone1,Phone2,id_img_1,id_img_2,Date)
                                      VALUES(:zN,:zSE,:zAS,:zTC,:zTF,:zIN,:zSD,:zC,:zCL,:zST,:zRV,:zAD,:zE,:zP1,:zP2,:zimg1,:zimg2,now())");

      $set->execute(array(
        "zN"  =>$Name,
        "zSE" =>$own,
        "zAS" =>$amin,
        "zTC" =>$TCard,
        "zTF" =>$TFile,
        "zIN" =>$IndexNum,
        "zSD" =>$SetDate,
        "zC"  =>$CapNum,
        "zCL" =>$CapLang,
        "zST" =>$ownarr,
        "zRV" =>$Mokt,
        "zAD" =>$address,
        "zE" =>$Email,
        "zP1" =>$Phone1,
        "zP2" =>$Phone2,
        "zimg1" =>$img1,
        "zimg2" =>$img2
      ));

    $setDB =  $set->rowCount();

    if ($setDB>0) {
      GENFun_Class\Fun_Class::myModal("اضافة شركة جديدة",'<div class="alert alert-info" role="alert">لقد تمت عملية اضافة شركة <strong> [ ' .$Name .' ] </strong> بنجاح </div>',"فتح الارشيف","goArch",$Name,"goArch('#ModalGo')");
    }else {
      GENFun_Class\Fun_Class::myModal("اضافة شركة جديدة",'<div class="alert alert-info" role="alert"> لم يتم اضافة الشركة برجاء المحاولةالتأكد من البيانات ثم المحاول مرة اخري </div>');
    }

    ?>

    <script type="text/javascript">
      $('#phpClick').click();
    </script>

    <?php
      $impDIR = explode("includes", __DIR__);
      $path = $impDIR[0]."data\\شركات المساهمة\\{$Name}";
      // exec("EXPLORER /E,$path");

    }

  }elseif (isset($page) && $page == "gpArch") {
    if (isset($_POST["goArch"])) {
      $val = $_POST["goArch"];
      $impDIR = explode("includes", __DIR__);
      if(is_dir($data."/شركات المساهمة"."/{$val}")){
        $path = $impDIR[0]."data\\شركات المساهمة\\{$val}";
        exec("EXPLORER /E,$path");
      }else {
        echo "not exist";
        GENFun_Class\Fun_Class::myModal("ارشيف " . $val,'<div class="alert alert-danger" role="alert">لا يمكن فتح ارشيف شركة '."<strong> [ {$val} ] </strong>".' ملف الشركة غير موجود</div>');
        ?>

        <script type="text/javascript">
          $('#phpClick').click();
        </script>

        <?php
      }

    }
  }elseif (isset($page) && $page == "logForm") {
    if (isset($_POST["logName"])) {
      $Name = $_POST["logName"];
      $NamerowCount = cHECKexist("ID","users","WHERE Name LIKE ?","",$Name);
      // $NamerowCount = true;
      if (!$NamerowCount) {

          ?>
            <script type="text/javascript">
              var USInP = $("#exampleInputName");
              USInP.addClass("checkError");
            </script>
          <?php
      }else {
        ?>
          <script type="text/javascript">
            $("#exampleInputName").removeClass("checkError");
          </script>
        <?php
      }

    }
  }elseif (isset($page) && $page == "DelComp") {
    if (isset($_POST["trash"])) {
      $post = $_POST["trash"];
        $CompName = cHECKexist("ID","stocks","WHERE Name LIKE ?","",$post);
        if ($CompName) {
            if (is_dir($data."/شركات المساهمة"."/{$post}")) {
              xrmdir($data."/شركات المساهمة"."/{$post}");
            }
            $del = $con->prepare("DELETE FROM stocks WHERE Name = :zN");

            $del->bindParam(":zN", $post);

            $del->execute();

            $DeletedDB = $del->rowCount();

            if ($DeletedDB>0) {
              echo "Deleted";
            }
        }
    }
  }else if(isset($page)&& $page == "_S"){
    if (isset($_POST["Fixed_Search"])) {
      $post = $_POST["Fixed_Search"];
      $post = filter_var($post,FILTER_SANITIZE_STRING) ;

        $get = GENFun_Class\Fun_Class::getVal("Name,ID","stocks","WHERE Name LIKE '%$post%'","OR CEO LIKE '%$post%'");
        if (!empty($get)) {
          foreach ($get as $key => $value) {
            ?>
            <button class="btn badge btn-light" type="button" name="button">
              <a class="Search_result" href="category?cat=EditStockC&StockID=<?php echo $value["ID"] ?>">
                <?php echo $value["Name"] ?>
              </a>
            </button>
            <?php
          }
        }else {
          ?>
          <button class="btn badge btn-light" disabled type="button" name="button">
            <a class="Search_result" href="#">
              لا توجد بيانات
            </a>
          </button>
          <?php
        }


    }
  }
  /****************************************/
  endif;

  }

ob_end_flush();  // Release The Output

?>

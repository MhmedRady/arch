<?php
  ob_start();
  session_start();

  $getLOG = isset($_GET["log"]) && $_GET["log"] !=null ? $_GET["log"] :"";

    if (isset($_SESSION["USERNAME"])):
      echo "esssion";
        header("location:http://localhost/arch");

        exit;

      else:


        $getLOG = isset($_GET["log"]) && $_GET["log"] !=null ? $_GET["log"] :"";

        $pageTitle = $getLOG =="regest"?"اضافة مستخدم":"تسجيـل الدخول";
        $body      = 1;
        $noNavbar  = 0;
        $StartUp   = 1;
        require 'inc.php';

    if ($_SERVER["REQUEST_METHOD"]=="POST") {

        if (isset($_POST["LOGForm"])) {
          echo "LOGForm";
          $user = $_POST["logName"];
          $pass = GENFun_Class\Fun_Class::HashPass($_POST["logPass"]);

          $NamerowCount = cHECKexist("ID","users","WHERE Name LIKE ?","",$user);
          $PassCheck    = cHECKexist("ID","users","WHERE Name LIKE ?","AND Pass LIKE ?",$user,$pass);
          $CheckData    = GENFun_Class\Fun_Class::getOne("*","users","WHERE Name LIKE ?","AND Pass LIKE '%$pass%'",$user);
          if($PassCheck){
            echo "good pass";
          }else{
            echo "bad pass";
          }
          print_r($CheckData);

          $CheckBlock = $CheckData[0]["Block"];

          $eRRorName = array();
          $eRRorPass = array();
          echo "block =>" . $CheckBlock;
          $NamerowCount = $PassCheck = true;
          if (empty($user)) {
            $eRRorName[] =  '<i class="fa fa-times"></i>  ' . "اسم المستخدم فارغ";
          }
          elseif (!$NamerowCount) {
              $eRRorName[] = '<i class="fa fa-times"></i>  ' . "هذا المستخدم غير موجود ";
          }else
          if ($CheckBlock != 0) {
             $eRRorName[] = '<i class="fa fa-times"></i>  ' . " هذا المستخدم محظور الدخول من قبل الادارة ";
          }
        if ($_POST["logPass"]) {
            $eRRorPass[] = '<i class="fa fa-times"></i> كلمة المرور فارغة';
        }
        else
        if (!$PassCheck) {
            $eRRorPass[] = '<i class="fa fa-times"></i>  كلمة المرور غير صحيحة';
        }
          if($NamerowCount&&$PassCheck&&$CheckBlock==0) {
            $ID = $CheckData[0]["ID"];
            $_SESSION["ID"] = $ID;
            $_SESSION["USERNAME"] = $CheckData[0]["Name"];

            header("location:index.php");
          }
        }
    }

  ?>



  <section class="logphp">
    <div class="overlay"></div>
    <div class="container">
      <center>

        <?php if ($getLOG =="regest"):?>

          <div class="card log_card regest col-xl-4 col-lg-6 col-md-8">
            <div class="log_icon">
              <span>
                <i data-feather="user-plus"></i>
              </span>
            </div>
            <h5>إضافة مستخدم جديد</h5>
            <form class="regest" action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
              <div class="form-group user_input">
               <label for="exampleInputName">اسم المستخدم</label>
               <i data-feather="user" class="user_svg"></i>
               <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" placeholder="ادخل اسم المستخدم">
                  <span id="NameHelp" class="form-text text-muted error"></span>

             </div>
             <div class="form-group phone_input">
              <label for="exampleInputName">رقم الهاتف</label>
              <i data-feather="phone" class="user_svg"></i>
              <input type="text" class="form-control Numeric" id="exampleInputPhone" aria-describedby="emailHelp" placeholder="0100-000-000-0" maxlength="14" data-mask="0100-000-000-0">
              <span id="PhoneHelp" class="form-text text-muted error"></span>
            </div>
             <div class="form-group pass_input">
               <label for="exampleInputPass">كلمة السر</label>
               <input type="password" class="form-control pass" id="exampleInputPass" aria-describedby="emailHelp" placeholder="ادخل كلمت السر">
               <input type="password" class="form-control re_pass" id="exampleInputPass_2" aria-describedby="emailHelp" placeholder="إعادة ادخال كلمة السر">

               <div class="pass_svg">
                 <i data-feather="lock" class=" loc see"></i>
                 <i data-feather="unlock" class=" un"></i>
               </div>
               <small id="PassHelp" class="form-text text-muted error"></small>
             </div>
            <button id="regest" class="log btn badge btn-info btn-sm" type="button" name="button"> <i data-feather="user-plus"></i> اضافة المستخدم </button>
            </form>
          </div>

        <?php else :?>

          <div class="card log_card col-xl-4 col-lg-6 col-md-8">
            <div class="log_icon">
              <span>
                <i data-feather="key"></i>
              </span>
            </div>
            <form id="LOGForm" action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
              <div class="form-group user_input">
               <label for="exampleInputName">اسم المستخدم</label>
               <i data-feather="user" class="user_svg"></i>
               <input type="text" class="form-control checkError" id="exampleInputName" name="logName" aria-describedby="emailHelp" autocomplete="on" value="<?php if(isset($user)){echo $user;} ?>" placeholder="ادخل اسم المستخدم">
               <?php if(isset($eRRorName) && count($eRRorName)>0){
                 ?>
                 <span id="NameHelp" class="form-text text-muted error logPostNErr"><?php echo $eRRorName[0] ?></span>
                 <?php
               }else {
                 ?>
                 <span id="NameHelp" class="form-text text-muted error"></span>
                 <?php
               } ?>
               <span id="NameCheckHelp" class="form-text text-muted error"></span>

             </div>
             <div class="form-group pass_input">
               <label for="exampleInputPass">كلمة السر</label>
               <input type="password" class="form-control" id="exampleInputPass" name="logPass" aria-describedby="emailHelp" placeholder="ادخل كلمت السر">
               <div class="pass_svg">
                 <i data-feather="lock" class=" loc see"></i>
                 <i data-feather="unlock" class=" un"></i>
               </div>
               <?php if(isset($eRRorPass) && count($eRRorPass)>0){
                 ?>
                 <span id="PassHelp" class="form-text text-muted error logPostPErr"><?php echo $eRRorPass[0] ?></span>
                 <?php
               }else {
                 ?>
                 <span id="PassHelp" class="form-text text-muted error"></span>
                 <?php
               } ?>
              </div>
             <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">تذكرني  </label>
            </div>
            <button id="logBTN" class="log btn badge btn-info btn-sm" type="submit"  name="LOGForm"> <i data-feather="log-in"></i>تسجيل</button>
            </form>
            <a href="?log=regest">
              <button class="btn badge btn-primary btn-sm add_user"type="button" name="button">

                <i data-feather="user-plus"></i> اضافة مستخدم

              </button>
            </a>

          </div>

        <?php endif; ?>

      </center>
    </div>
  </section>

<?php
  endif;

  include $tpl. 'footer.inc';
  ob_end_flush();  // Release The Output

 ?>

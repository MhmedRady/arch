<?php
ob_start();

session_start();
$body = 0;
$noNavbar  = '0';
$pageTitle = 'LORD|mark'; //
include '..\..\..\int.php';
?>
<link rel="stylesheet" href="../../../layout/css/font-awesome.min.css">
<link rel="stylesheet" href="../../../layout/css/bootstrap.min.css">
<?php
if (isset($_SESSION['LORDADMIN'])) {

 ?>

<style>
body{width:50%; display: none;;background-image: url('../../../layout/imgs/4.png');background-repeat: no-repeat;background-attachment: fixed;background-position: center;}
#frmCheckUsername {border-top:#F0F0F0 2px solid;background:rgba(0,0,0,0.87);padding:10px;width: 100%;box-shadow: 20px 20px 50px 0px; border-radius: 20px 20px 130px 130px;; margin: 50px 0px 0px 30px;}
.demoInputBox{padding:7px; border:#F0F0F0 1px solid; border-radius:4px;}
.status-available{color:#2FC332; font-weight: bold;}
.status-not-available{color:#EC1818; font-weight: bold;}
</style>
<script src="jquery-1.12.4.min.js" type="text/javascript"></script>
<script src="AJAX.js"></script>

<script>

       /* fadeIn BODY AFTER DATA LOADING */
       $('body').fadeIn(500);
       $('.body').fadeIn(1000);

</script>

<style media="screen">
.demoInputBox {
  padding: 7px;
  border:
  #F0F0F0 1px solid;
  border-radius: 4px;
  width: 70%;
  margin: 10px auto;
}

.check{
  position: relative;
left: 50%;
}

.check label, .check input{
  color: #eee;

  text-align: center;
font: 18px 'LeagueGothicRegular';
} .check input{background-color: rgba(0,0,0,0.2);
  -webkit-transition: all 1s ease-in-out;
  -moz-transition: all 1s ease-in-out;
  -o-transition: all 1s ease-in-out;
  transition: all 1s ease-in-out;}
.check input:focus{color: #eee ;background-color:rgba(0,0,0,0.2);box-shadow: 5px 5px 15px 0px#eee;}
strong{font-size: 15px;font-weight: bolder;color:#ff0909;}
.check .checkM,.check .checkB,.check .checkC{margin: 50px auto auto;font-size: 17px;cursor: pointer;}
.click{position: relative;left: 0%;margin: 5px}.error{padding: 2px;}
.view > div:not(:first-child){display: none;}.active{color:#bd0909;box-shadow: 3px 3px 6px 3px#999494;transform: translateY(-7px);}
</style>
<div class="check">

<div class="row">
  <div class="checkM ">
  <span data-class=".Member" class="active click badge badge-dark"><i class="fa fa-user"></i> Check Member Data</span>
  <span data-class=".Brand" class="click badge badge-warning"><i class="fa fa-star"></i> Check Brand Data</span>
  <span data-class=".Category" class="click badge badge-secondary"><i class="fa fa-cubes"></i> Check Category Data</span>
</div>
</div>
<div class="view">

<div class="member Member">

 <!-- <span style='border-radius: 40px;padding: 0 20px;text-align: center;font-weight: 550;margin: 50% auto;' class=' alert alert-secondary'><i class='fa fa-exclamation'></i> To Add More Data For This Brand <a class=' badge btn badge-light' href="'Brand.php?do=EditB&Brand/ID=' . " >Edit Brand</a> </span> -->
            <!-- CHECK MEMBER NAME -->

            <div id="frmCheckUsername" class=" hide badge badge-warning">
              <label class="col-sm-2 col-md-10 control-label "> <i class="fa fa-user-o"></i>  Check Member Name :</label>
                  <input name="username" type="text" id="username" class="demoInputBox form-control"
                  class="" onBlur="checkMemberName()" placeholder='Enter Your Check Name'><span id="name-availability-status"></span>
            </div>

            <!-- CHECK MEMBER EMAIL -->

            <div id="frmCheckUsername" class=" hide badge badge-warning">
              <label class="col-sm-2 col-md-10 control-label "> <i class="fa fa-envelope-square"></i>  Check Member Email :</label>
                  <input name="email" type="text" id="email" class="demoInputBox form-control"
                  class="" onBlur="checkMemberEmail()" placeholder='Enter Your Check Name'><span id="email-availability-status"></span>
            </div>


            <!-- CHECK MEMBER PHONENUM -->

            <div id="frmCheckUsername" class=" hide badge badge-warning">
              <label class="col-sm-2 col-md-10 control-label "> <i class="fa fa-mobile"></i>  Check Member Phone :</label>
                  <input name="phone" type="text" id="phone" class="demoInputBox form-control"
                  class="" onBlur="checkMemberPhone()" placeholder='Enter Your Check Name'>
                    <!-- <span class='error alert alert-secondary error'><i class='fa fa-exclamation'></i> PhoneNum Must Be [ 11 ] Number</span> -->
                  <span id="phone-availability-status"></span>
            </div>
        </div>


<div class="Brand">

    <!-- CHECK BRAND NAME -->

    <div id="frmCheckUsername" class=" hide badge badge-warning">
      <label class="col-sm-2 col-md-10 control-label "> <i class="fa fa-star-o"></i>  Check Brand Name :</label>
      <input name="brandname" type="text" id="brandname" class="demoInputBox  form-control" onBlur="checkBrand()" placeholder='Enter Your Check Name'><span id="brand-availability-status"></span>
    </div>

  </div>

    <div class="checkC Category">

    <!-- CHECK MINE CATEGORY NAME -->

    <div id="frmCheckUsername" class=" hide badge badge-warning">
      <label class="col-sm-2 col-md-10 control-label text-center"> <i class="fa fa-cubes"></i>  Check Category Name :</label>
      <input name="Categoryname" type="text" id="Categoryname" class="demoInputBox  form-control" onBlur="checkCat()" placeholder='Enter Your Check Name'><span id="cat-availability-status" ></span>
    </div>
</div>
    <!-- CHECK CHILD CATEGORY NAME -->

    <!-- <div id="frmCheckUsername" class="badge badge-warning">
      <label class="col-sm-2 col-md-10 control-label text-center"> <i class="fa fa-cubes"></i>  Check Parent Category Name :</label>
      <input name="parentname" type="text" id="parentname" class="demoInputBox  form-control" onBlur="checkParent()" placeholder='Enter Your Check Name'><span id="parentname-availability-status" ></span>
    </div>
 -->
</div>
  <!-- /**********************/ -->
</div>
</div>


<script type="text/javascript">

</script>


<?php


/****************************************/


}else{

  echo '<div class="alert alert-danger"> ' . "<i class='fa fa-times'></i>" . "  " . "Sorry Just <strong> ADMIN </strong> Can Open This Page. '</div>' ";
  echo '<div class="alert text-center alert-info"> ' . "<i class='fa fa-exclamation'></i>" . "  " . "You Will Redirect to <strong> Login </strong> Page  After 3 Seconds. '</div>' ";

  header('Refresh: 3; url=..\..\..\index.php');

exit();
}

ob_end_flush();  // Release The Output


 ?>

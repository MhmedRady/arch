<?php

ob_start();

?>
  <title>LORD|Mark</title>
  <link rel="icon" type="image/png" href='../../../4.png'>
<?php

$pageTitle = 'LORD|mark'; //

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  include '../../../GENint.php';
  $GET   = isset($_GET['GET']) ? $_GET['GET'] = 'GET!' :NULL;


  if ($GET == 'GET!') :

    $page = !isset($_GET['Page']) ? $_GET['Page'] = 'data' : $_GET['Page'];

    if (isset($page) && $page == 'data') {

      if(isset($_POST["Main"]) && !empty($_POST["Main"]) ) {

        $checkCM = filter_var($_POST["Main"],FILTER_SANITIZE_NUMBER_INT) ;

            $CMain = checkItem('ID', 'Categories', $checkCM, 'AND Parent =0 AND Visibility = 1');

          if($CMain!==0 ) {
            $get = getOne('ID,Name','Categories',"WHERE Parent = $checkCM",'AND Visibility = 1');
         ?>
         <option class="emp" value="0">....</option>

           <?php foreach ($get as $P): ?>
             <option value="<?php echo $P['ID'] ?>">
                <?php $cat1 = new arb(); $CN = $cat1->val = $P['Name']; ?>
                <?php if (array_key_exists($CN,$cat1->langA)) {
                  echo $cat1->langA($CN);
                } else {
                  echo $P['Name'];
                } ?>
              </option>
               <?php // echo "<option class='ajxslct' value=" . $P['ID'] . ">" . $P['Name']. "</option>"; ?>
           <?php endforeach; ?>
         <?php

         }
       }

    }

  endif;

}else {
  ?>
    <div class="check-alert alert alert-danger">
      <i class='fa fa-times'></i>
      Sorry Just <strong> ADMIN </strong> Can Open This Page.
    </div>
    <div class="check-alert alert text-center alert-info">
      <i class='fa fa-exclamation'></i>
    So You Will Redirect to <strong style="text-decoration:underline;"> Login </strong> Page  After <strong>3</strong> Seconds.
    </div>
    <style media="screen">
      body{
        background-image: url('../../../4.png');
        background-attachment: fixed;
        background-size: initial;
        background-repeat: no-repeat;
        background-position-x: center;
        background-position-y: center;
        opacity: .9;
      }
      .error {padding: 2px; color:#000;background-color:#e2e3e58f;}
      .strong {font-size: 15px;font-weight: bolder;color: #c40404;}
      .check-alert{
        margin: 0 auto;
        box-shadow: 1px 10px 5px -8px;
        margin-top: 0px;
        text-align: center;
        margin-top: 10%;
        background: #ac0020 !important;
        font-size: 30px;
        color: #fff;
        font-weight: bold;
        padding: 50px;
        position: relative;
        top: 50%;
        box-shadow: 0 10px 5px 5px #6c1021a1,inset 0 0 5px 5px #911b30;
        border: 2px solid #604a4a75;
        text-shadow: 0 5px 5px #000;
}

    </style>

  <?php

    header('Refresh: 1000; url=..\..\..\Login.php');

  exit();
}

 ?>

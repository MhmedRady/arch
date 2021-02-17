<?php

    //Concecte code

    include 'connect.php';

    // Routes


    $img = 'layout/images/';

    $tpl   = 'includes/templates/';
    $lang  = 'includes/languages/';
    $fun   = 'includes/functions/';
    $lib   = 'includes/libraries/';
    $css   = 'layout/css/';
    $live  = 'includes/libraries/live/';

    // $Font = 'layout/fonts/';

    $js   = 'layout/js/';
    // $Sup  = 'Startup/';
    $Des  = 'design/';

    require $fun  . 'GEN-Function.php' ;
    require $fun  . 'functions.php' ;

    include $tpl  . 'Header.inc';
    use GENFun_Class\Fun_Class as FCalss;
    use MyFun_Class\Fun_Class as my_FCalss;
    if ( !isset($noNavbar) || !$noNavbar == 0 ) {  include $tpl  . 'Navbar.php' ;    }

/*******************************************************************/

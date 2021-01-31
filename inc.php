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

    include $fun  . 'GEN-Function.php' ;
    include $fun  . 'functions.php' ;
    include $lang . 'arb.php';
    

    include $tpl  . 'Header.inc';

    if ( !isset($noNavbar) || !$noNavbar == 0 ) {  include $tpl  . 'Navbar.php' ;    }

    // if (!$StartUp  == '0' ) {  include $Sup  . 'Startup.php';    }



// Iclude Nav When $noNavbar = '1';
// if (!$AJAXSRCH == '0') {  include $lib . 'AJAXSEARCH.php' ;    }

/*******************************************************************/

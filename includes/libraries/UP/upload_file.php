<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
  }else {

$PAGE = isset($_GET['addLoad'])? $_GET['addLoad']: '';

  if ($PAGE == "uPIDImg") {

    for ($i=1; $i <3 ; $i++) {
      if (!empty($_FILES["ownID_{$i}"])) {

            @$IMG  = $_FILES['ownID_'.$i];

            $imgname  = $IMG['name'];
            $imgsize  = $IMG['size'];
            $imgtype  = $IMG['type'];
            $imgTemp  = $IMG['tmp_name'];
            $imgerr   = $IMG['error'];
            // print_r($IMG);

            // GET LIST OF ALLOWED FILE UPLODE TYPES

            $imgAllowExtension = array("jpeg", "jpg", "png");

            // GET VARIABLE FROM FORMS

            @$imgformat = strtolower(end(explode('.',$imgname)));

            $ERRIMG = array();

            if ( $imgerr == 0 && !empty($imgname) && in_array($imgformat,$imgAllowExtension) && $imgsize < 10289152 ) {
              $path = 'upload/'."ownID_{$i}";
              if (is_uploaded_file($imgTemp)) {
                if (!is_dir($path)) {
                   @mkdir($path,0700);
                }

                $files = scandir($path,SCANDIR_SORT_NONE);
                $count = count($files);
                for ($d=2; $d <$count ; $d++) {
                  if (isset($files[$d])) {
                  @unlink($path.'/'.$files[$d]);
                  // @rmdir($path);
                    //  exit();
                  }
                }

                function myRand()
                {
                  return rand(0,100);
                }

                // sleep(1);
                $imgN = " ({$i}) " . "البطاقة الشخصية " . "_" . myRand() . "." . $imgformat;

                $target_path = $path . "/" . $imgN;
                move_uploaded_file($imgTemp, $target_path);
                $files = scandir($path,SCANDIR_SORT_NONE);
                if (in_array($imgN,$files)) {
                  $out_Path = "includes/libraries/UP/".$target_path ;
                  ?>
                    <img id="Img_ID_"<?php echo $i; ?> src="<?php echo $out_Path; ?>" alt="البطاقة الشخصية الاولي" width="100%" height="200">
                  <?php
                }
              }

            }else {
              exit;
            }

      }

    }

  }elseif ($PAGE == "aRchs") {
    echo "aRchs";
    $File = isset($_GET["Files"])?$_GET["Files"]:"";

        for ($i=1; $i <11 ; $i++) {

          if ($File == "uPFile_{$i}") {
            $upFile = $_FILES["File_{$i}"];
            print_r($upFile);
            if ($upFile["error"]!==0) {
              echo ' <center> <strong> "لا يوجد ملف قم باختيار الملف اولا" </strong> </center> ';
            }elseif ($upFile["size"]>36700160) {
              echo ' <center> <strong> " مساحة الملف اكبر من 35MG " </strong> </center> ';
            }else {
              if (!is_dir("../UP/upload/Arch_files")) {
                  mkdir("../UP/upload/Arch_files",0700);
                  mkdir("../UP/upload/Arch_files/File_{$i}",0700);
              }elseif (!is_dir("../UP/upload/Arch_files/File_{$i}")) {
                  @mkdir("../UP/upload/Arch_files/File_{$i}",0700);
              }

              $FName = $upFile["name"];
              $FTmp = $upFile["tmp_name"];
              if (is_uploaded_file($FTmp)) {
                $path_file = "../UP/upload/Arch_files/File_{$i}";
                $files = scandir($path_file,SCANDIR_SORT_NONE);
                $count = count($files);

                echo "file count =>".$count;

                for ($d=2; $d <$count ; $d++) {
                  if (isset($files[$d])) {
                  @unlink($path_file.'/'.$files[$d]);
                  }
                }

                $target_path = $path_file . "/" . $FName;
                move_uploaded_file($FTmp, $target_path);
                echo "moved";
              }
            }
          }

        }

  }



}

 ?>

<?php
        ob_start();
session_start();
if (!isset($_SESSION["USERNAME"])):
  header("location:log");
  exit;
  else:

$get_Cat = isset($_GET['cat']) && $_GET['cat'] != NULL?$_GET['cat']:exit;
if ($get_Cat == "NewStockC") {
  $pageTitle ="إضافة شركة مساهمة";
}else {
  $pageTitle = 'الشركات';
}

    $body      = 1;
    $noNavbar  = 1;
    $StartUp   = 1;
    include 'inc.php';

?>
<section class="catgor_P">
  <div class="container catgor_container">

<?php

    if($get_Cat == "stock_Comp"){

?>

<div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-primary"> <i class="fa fa-quote-left"></i> شركـات المساهمة   </h6>
  <button class="add-new btn badge btn-primary btn-sm" type="button" name="button"> <a href="?cat=NewStockC"> <i data-feather='plus-square'></i> إضافة شركة جديدة</a> </button>
</div>
<?php

$getAll = getVal("*","stocks");

 ?>
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>إسم الشركة</th>
                    <th>مجلس الادارة</th>
                    <th>راس المال</th>
                    <th>المساهمين</th>
                    <th>المكتتبين</th>
                    <th>رقم السجل</th>
                    <th>تاريخ التسجيل</th>
                    <th>البطاقة . ض</th>
                    <th>Controls</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($getAll as $key => $Comp): ?>
                <tr>

                  <?php $Uid = $Comp["ID"]; ?>

                <td title="name"><?php echo $Comp["Name"] ?></td>
                <td><?php echo $Comp["CEO"] ?></td>
                <td title="<?php echo $Comp["CapitalLang"] ?>"><?php echo $Comp["Capital"] ?></td>
                <td><?php echo $Comp["Stockrs"] ?></td>
                <td><?php echo $Comp['Revers'] ?></td>
                <td><?php echo $Comp["IndexNum"] ?></td>
                <td><?php echo $Comp["SetDate"] ?></td>
                <td><?php echo $Comp["TaxCard"] ?></td>

                <td>
                  <button id="openArch_<?php echo $Comp["ID"] ?>" class="btn badge btn-primary btn-sm" type="button" name="goArch" onclick="goArch('#openArch_<?php echo $Comp["ID"] ?>')" value="<?php echo $Comp["Name"] ?>">
                    الأرشيف
                  </button>
                  <button class="btn badge btn-warning btn-sm" type="button" name="button">
                    <a href="<?php echo "?cat=EditStockC&StockID=$Uid" ?>">
                      تعديل
                    </a>
                  </button>
                  <div class="moveBTNs">
                    <button id="Del_<?php echo $Comp["ID"] ?>" class="btn badge btn-danger btn-sm " type="button" name="trash" onclick="delComp('#Del_<?php echo $Comp["ID"] ?>')" value="<?php echo $Comp["Name"] ?>">
                      <strong>
                        <i data-feather='trash-2'></i>
                      </strong>
                    </button>
                    <button  class="btn badge btn-success btn-sm whatApp" type="button" name="whatApp">
                      <a target="_blank" href="https://api.whatsapp.com/send?phone=+02<?php echo $Comp["Phone1"] ?>&text=&source=&data=&app_absent=">
                        <strong>
                          <i class="fa fa-whatsapp"></i>
                        </strong>
                      </a>
                    </button>
                    <button class="btn badge btn-primary btn-sm " <?php if(empty($Comp["Email"])){echo "disabled";} ?> type="button" name="gMail" >

                      <a target="_blank" href="mailto:<?php echo $Comp["Email"] ?>?subject=<?php echo $Comp["Name"]; ?>">
                        <strong>
                          <i data-feather='mail'></i>
                        </strong>
                      </a>

                    </button>
                  </div>
                </td>

              </tr>

              <?php endforeach; ?>

            </tbody>
          </table>

    <?php }elseif ($get_Cat == "NewStockC") {
      /**************************** ** ADD ARR COMP ** ******************************/

      ?>

      <div class="addComp">
        <h4 class="m-0 font-weight-bold text-primary"> <i class="fa fa-quote-left"></i> <?php echo $pageTitle ?>  </h4>
        <form class="addArrC" action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <div class="row addCompRow">

          <!-- /******* COL1 ******/ -->

            <div class="col-xl-5">
              <?php
                myFormInput(
                  "اسم الشركة",
                  "CompName",
                  "CompNameERR",
                  "ادخل اسم شركة المساهمة الجديدة",
                  "",
                  "required"
                );
               ?>
               <div class="row">
                 <div class="col-xl-6 col-lg-6 col-md-6">
                     <?php
                     myFormInput(
                       "رئيس مجلس الإدارة",
                       "ownName",
                       "ownNameERR",
                       "",
                       "",
                       "required"
                     );
                      ?>
                 </div>
                 <div class="col-xl-6 col-lg-6 col-md-6">
                   <?php
                   myFormInput(
                     "أمين السر",
                     "aminName",
                     "aminNameERR",
                     "",
                     "",
                     "required"
                   );
                    ?>
                 </div>
               </div>

               <div class="row">
                 <div class="col-xl-6 col-lg-6 col-md-6">
                     <?php
                     myFormInput(
                       "رقم البطاقة الضريبية",
                       "TaxCardNum",
                       "FileTaxNumERR",
                       "123-456-789",
                       "Numeric text-center",
                       "required",
                       "text",
                       "",
                       "000-000-000"
                     );
                      ?>
                 </div>
                 <div class="col-xl-6 col-lg-6 col-md-6">
                   <?php
                   myFormInput(
                     "رقم الملف الضريبي",
                     "FileTaxNum",
                     "FileTaxNumERR",
                     "000-0-00000-000-00-00",
                     "Numeric text-center",
                     "required",
                     "text",
                     "",
                     "000-0-00000-000-00-00"
                   );
                    ?>
                 </div>
               </div>

               <div class="row">
                 <div class="col-xl-6 col-lg-6 col-md-6">
                     <?php
                     myFormInput(
                       "رقم السجل التجاري",
                       "IndexNum",
                       "IndexNumERR",
                       "رقم تسجيل الشركة في السجل",
                       "Numeric text-center",
                       "required"
                     );
                      ?>
                 </div>
                 <div class="col-xl-6 col-lg-6 col-md-6">
                   <?php
                   myFormInput(
                     "تاريخ التسجيل ",
                     "IndexDate",
                     "IndexDateERR",
                     "01/01/0000",
                     "text-center",
                     "required"
                   );
                    ?>
                 </div>
               </div>

               <div class="row">
                 <div class="col-xl-5 col-lg-5 col-md-5">
                      <?php
                     myFormInput(
                       " راس مال الشركة ( ارقام فقط )",
                       "CompCapitelNum",
                       "CapitelNumERR",
                       "100,000,000",
                       "Numeric text-center",
                       "required",
                       "text",
                       "",
                       "000,000,000,000,000,000,000"
                     );
                      ?>
                 </div>
                 <div class="col-xl-7 col-lg-7 col-md-7">
                   <?php
                   myFormInput(
                     "راس المال بالغة العربية",
                     "CompCapitellang",
                     "CapitellangERR",
                     "فقط مليون جنيه مصري"
                   );
                    ?>
                 </div>
               </div>

                <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-6">
                      <?php
                      myFormInput(
                        "المساهمين ( ارقام فقط )",
                        "ownarrCount",
                        "ownarrCountERR",
                        "ادخل عدد المساهمين",
                        "Numeric text-center",
                        "required"
                      );
                       ?>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6">
                    <?php
                    myFormInput(
                      " المكتتبين ( ارقام فقط )",
                      "ownrsMokt",
                      "ownrsMoktERR",
                      "ادخل عدد المكتتبين",
                      "Numeric text-center"
                    );
                     ?>
                  </div>
                </div>


            </div>



            <!-- /******* COL2 ******/ -->

            <div class="col-xl-6">

               <div class="row">
                 <div class="col-xl-7">
                   <?php
                     myFormInput(
                       "عنوان الشركة",
                       "address",
                       "addressERR",
                       "",
                       "",
                       "required"
                     );
                    ?>
                 </div>
                 <div class="col-xl-5 col-lg-5 col-md-5">
                   <?php
                     myFormInput(
                       "Email",
                       "CompEmail",
                       "CompEmailERR",
                       "Company_Name@Domain.com",
                       "text-center",
                       "",
                       "email"
                     );
                    ?>
                 </div>
               </div>

              <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                     <?php
                    myFormInput(
                      "رقم هاتف الشركة",
                      "CompPhoneNum1",
                      "CompPhoneNum1ERR",
                      "000-000-000-00",
                      "Numeric text-center",
                      "required",
                      "text",
                      "",
                      "000-000-000-00"
                    );
                     ?>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                  <?php
                  myFormInput(
                    "رقم هاتف اضافي",
                    "CompPhoneNum2",
                    "CompPhoneNum2ERR",
                    "000-000-000-00",
                    "Numeric text-center",
                    "",
                    "text",
                    "",
                    "000-000-000-00"
                  );
                   ?>
                </div>
              </div>

              <div class="row id_img">
                <div class="col-xl-6 col-lg-6 col-md-6">
                  <span class="required"> البطاقة الشخصية ( الأولي ) </span>
                   <div class="ID_Img ID_1">
                     <img id="Img_ID_1" src="<?php echo $img; ?>id.jpg" alt="البطاقة الشخصية الاولي" width="100%" height="200">
                   </div>

                   <input id="ID_img_1" style="display:none" type="text" name="id_img_1" value="">

                   <div class="change_id_img d-grid gap-2 mx-auto">
                     <button id="ownID_1" type="button" class="btn badge btn-primary btn-float" name="button"> <i class="fa fa-upload"></i>  رفع الصوره </button>
                   </div>
                   <input id="ID_img_2" style="display:none" type="text" name="id_img_2" value="">

                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                  <span class="required">البطاثة الشخصية ( الثانية )</span>
                   <div class="ID_Img ID_2">
                     <img id="Img_ID_1" src="<?php echo $img; ?>id.jpg" alt=" البطاقة الشخصية الثانية " width="100%" height="200">
                   </div>

                   <div class="change_id_img d-grid gap-2 mx-auto">
                     <button id="ownID_2" type="button" class="btn badge btn-primary btn-float" name="button"> <i class="fa fa-upload"></i>  رفع الصوره </button>
                   </div>
                </div>
              </div>

            </div>

        </div>
        <button id="set_Data" style="display:none" type="submit" name="set_arrw_Comp"></button>
      </form>

      <div class="myModal">

            <!-- Button trigger modal -->
            <button type="button" class="btn badge btn-secondary clickModel col-xl-4" data-bs-toggle="modal" data-bs-target="#Arch_file" style="display:block"> <i class="fa fa-upload"></i>رفع ملفات الارشيف</button>

            <!-- Modal -->
            <div class="modal fade" id="Arch_file" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><?php echo "اضافة شركة جديدة"; ?></h5>
                    <button type="button" class="btn-close btn badge btn-dark ModalClose _Close" data-bs-dismiss="modal" aria-label="Close"> </button>
                  </div>
                  <div class="modal-body">
                    <?php for ($U=1; $U <=10; $U++) { echo $U;
                      ?>
                      <form id="upArchFile_<?php echo $U; ?>" method="post" enctype="multipart/form-data">
                        <div id="OUT_<?php echo $U; ?>" style="display:block;"></div>

                            <div class="form-group">

                             <input type="file" class="form-control" name="File_<?php echo $U; ?>" id="File_<?php echo $U; ?>"/>
                             <input type="submit" style="display:none;" id="SUB_<?php echo $U; ?>" value="Upload" class="btn btn-info"
                             onclick="sendPBar(<?php echo $U; ?>)"
                             >

                             <div class="progress">
                              <div id="BAR_<?php echo $U; ?>" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" ><span id="pres_<?php echo $U ?>"></span> </div>
                             </div>

                            </div>

                       </form>
                      <?php
                    } ?>
                  </div>
                  <div class="modal-footer">
                    <button id="ModalUpload" type="button" class="btn btn-primary ModalUpload"> تحميل </button>
                    <button type="button" class="btn btn-dark ModalClose" data-bs-dismiss="modal">إلغاء</button>
                  </div>
                </div>
              </div>
            </div>

      </div>

      <form id="upimg_1" method="post" style="display:none" enctype="multipart/form-data">
            <div class="form-group">
             <input type="file" class="form-control" name="ownID_1" id="Send_ownID_1" accept=".jpg, .png , .jpeg"  />
            </div>
       </form>
       <form id="upimg_2" method="post" style="display:none" enctype="multipart/form-data">
             <div class="form-group">
              <input type="file" class="form-control" name="ownID_2" id="Send_ownID_2" accept=".jpg, .png , .jpeg"  />
             </div>
        </form>
        <div class="row Btn-Form ">
          <div class="gap-2 mx-auto Btn-Form col-xl-8 col-11">
            <button id="add_submit" class="btn btn-primary" type="button"><i class="fa fa-plus"></i> اضافة الشركة </button>
            <button id="ears" class="btn btn-warning" type="button"><i class="fa fa-eraser "></i> تعديل الكل</button>
            <button id="GOBACK" class="btn btn-dark" type="button"><i class="fa fa-arrow-circle-o-left"></i> خروج</button>
          </div>
        </div>
      </div>
      <?php
    }elseif ($get_Cat == "EditStockC") {
      $id = isset($_GET["StockID"]) ? $_GET["StockID"]: NULL;
      if ($id!==NULL)
        $NamerowCount = cHECKexist("ID","stocks","WHERE ID LIKE ?","",$id);
        if ($NamerowCount) {
          $getAll = getOne("*","stocks","WHERE ID = ?","",$id);
          $val = $getAll[0];
          ?>

              <div class="addComp">
                <h4 class="m-0 font-weight-bold text-primary"> <i class="fa fa-quote-left"></i> شركة <?php echo $val["Name"] ?> </h4>
                <form class="addArrC" action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <div class="row addCompRow">

                  <!-- /******* COL1 ******/ -->

                    <div class="col-xl-5">

                      <input type="hidden" name="id" value="<?php echo $val["ID"] ?>">

                      <?php
                        myFormInput(
                          "اسم الشركة",
                          "CompName",
                          "CompNameERR",
                          "ادخل اسم شركة المساهمة الجديدة",
                          "",
                          "required",
                          "text",
                          "",
                          null,
                          "{$val['Name']}"
                        );
                       ?>
                       <div class="row">
                         <div class="col-xl-6 col-lg-6 col-md-6">
                             <?php
                             myFormInput(
                               "رئيس مجلس الإدارة",
                               "ownName",
                               "ownNameERR",
                               "",
                               "",
                               "required",
                               "text",
                               "",
                               null,
                               "{$val['CEO']}"
                             );
                              ?>
                         </div>
                         <div class="col-xl-6 col-lg-6 col-md-6">
                           <?php
                           myFormInput(
                             "أمين السر",
                             "aminName",
                             "aminNameERR",
                             "",
                             "",
                             "required",
                             "text",
                             "",
                             null,
                             "{$val['ASO']}"
                           );
                            ?>
                         </div>
                       </div>

                       <div class="row">
                         <div class="col-xl-6 col-lg-6 col-md-6">
                             <?php
                             myFormInput(
                               "رقم البطاقة الضريبية",
                               "TaxCardNum",
                               "FileTaxNumERR",
                               "123-456-789",
                               "Numeric text-center",
                               "required",
                               "text",
                               "",
                               "000-000-000",
                               "{$val['TaxCard']}"
                             );
                              ?>
                         </div>
                         <div class="col-xl-6 col-lg-6 col-md-6">
                           <?php
                           myFormInput(
                             "رقم الملف الضريبي",
                             "FileTaxNum",
                             "FileTaxNumERR",
                             "000-0-00000-000-00-00",
                             "Numeric text-center",
                             "required",
                             "text",
                             "",
                             "000-0-00000-000-00-00",
                             "{$val['TaxFile']}"
                           );
                            ?>
                         </div>
                       </div>

                       <div class="row">
                         <div class="col-xl-6 col-lg-6 col-md-6">
                             <?php
                             myFormInput(
                               "رقم السجل التجاري",
                               "IndexNum",
                               "IndexNumERR",
                               "رقم تسجيل الشركة في السجل",
                               "Numeric text-center",
                               "required",
                               "text",
                               "",
                               null,
                               "{$val['IndexNum']}"
                             );
                              ?>
                         </div>
                         <div class="col-xl-6 col-lg-6 col-md-6">
                           <?php
                           myFormInput(
                             "تاريخ التسجيل ",
                             "IndexDate",
                             "IndexDateERR",
                             "01/01/0000",
                             "text-center",
                             "required",
                             "text",
                             "",
                             null,
                             "{$val["SetDate"]}"
                           );
                            ?>
                         </div>
                       </div>

                       <div class="row">
                         <div class="col-xl-5 col-lg-5 col-md-5">
                              <?php
                             myFormInput(
                               " راس مال الشركة ( ارقام فقط )",
                               "CompCapitelNum",
                               "CapitelNumERR",
                               "100,000,000",
                               "Numeric text-center",
                               "required",
                               "text",
                               "",
                               "000,000,000,000,000,000,000",
                               "{$val["Capital"]}"
                             );
                              ?>
                         </div>
                         <div class="col-xl-7 col-lg-7 col-md-7">
                           <?php
                           myFormInput(
                             "راس المال بالغة العربية",
                             "CompCapitellang",
                             "CapitellangERR",
                             "فقط مليون جنيه مصري",
                             "",
                             "",
                             "text",
                             "",
                             null,
                             "{$val["CapitalLang"]}"
                           );
                            ?>
                         </div>
                       </div>

                        <div class="row">
                          <div class="col-xl-6 col-lg-6 col-md-6">
                              <?php
                              myFormInput(
                                "المساهمين ( ارقام فقط )",
                                "ownarrCount",
                                "ownarrCountERR",
                                "ادخل عدد المساهمين",
                                "Numeric text-center",
                                "required",
                                "text",
                                "",
                                null,
                                "{$val["Stockrs"]}"
                              );
                               ?>
                          </div>
                          <div class="col-xl-6 col-lg-6 col-md-6">
                            <?php
                            myFormInput(
                              " المكتتبين ( ارقام فقط )",
                              "ownrsMokt",
                              "ownrsMoktERR",
                              "ادخل عدد المكتتبين",
                              "Numeric text-center",
                              "",
                              "text",
                              "",
                              null,
                              "{$val["Revers"]}"
                            );
                             ?>
                          </div>
                        </div>


                    </div>


                    <!-- /******* COL2 ******/ -->

                    <div class="col-xl-6">

                       <div class="row">
                         <div class="col-xl-7">
                           <?php
                             myFormInput(
                               "عنوان الشركة",
                               "address",
                               "addressERR",
                               "",
                               "",
                               "required",
                               "text",
                               "",
                               null,
                               "{$val["Address"]}"
                             );
                            ?>
                         </div>
                         <div class="col-xl-5 col-lg-5 col-md-5">
                           <?php
                             myFormInput(
                               "Email",
                               "CompEmail",
                               "CompEmailERR",
                               "Company_Name@Domain.com",
                               "text-center",
                               "",
                               "email",
                               "",
                               null,
                               "{$val["Email"]}"
                             );
                            ?>
                         </div>
                       </div>

                      <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6">
                             <?php
                            myFormInput(
                              "رقم هاتف الشركة",
                              "CompPhoneNum1",
                              "CompPhoneNum1ERR",
                              "000-000-000-00",
                              "Numeric text-center",
                              "required",
                              "text",
                              "",
                              "000-000-000-00",
                              "{$val['Phone1']}"
                            );
                             ?>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6">
                          <?php
                          myFormInput(
                            "رقم هاتف اضافي",
                            "CompPhoneNum2",
                            "CompPhoneNum2ERR",
                            "000-000-000-00",
                            "Numeric text-center",
                            "",
                            "text",
                            "",
                            "000-000-000-00",
                            "{$val["Phone2"]}"
                          );
                           ?>
                        </div>
                      </div>

                      <div class="row id_img">
                        <div class="col-xl-6 col-lg-6 col-md-6">
                          <span class="required"> البطاقة الشخصية ( الأولي ) </span>
                           <div class="ID_Img ID_1">
                              <?php if (empty($val['id_img_1'])): ?>
                                <img id="Img_ID_1" src="<?php echo $img; ?>id.jpg" alt="البطاقة الشخصية الاولي" width="100%" height="200">
                                <?php else: ?>
                                  <img id="Img_ID_1" src="data/شركات المساهمة/<?php echo $val['Name']; ?>/البطاقة الشخصية/<?php echo $val["id_img_1"] ?>" alt="البطاقة الشخصية الاولي" width="100%" height="200">
                              <?php endif; ?>
                           </div>

                           <input id="ID_img_1" style="display:none" type="text" name="id_img_1" value="<?php echo $val["id_img_1"] ?>">

                           <div class="change_id_img d-grid gap-2 mx-auto">
                             <button id="ownID_1" type="button" class="btn badge btn-primary btn-float" name="button"> <i class="fa fa-upload"></i>  رفع الصوره </button>
                           </div>
                           <input id="ID_img_2" style="display:none" type="text" name="id_img_2" value="">

                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6">
                          <span class="required">البطاثة الشخصية ( الثانية )</span>
                           <div class="ID_Img ID_2">
                             <?php if (empty($val['id_img_2'])): ?>
                               <img id="Img_ID_1" src="<?php echo $img; ?>id.jpg" alt="البطاقة الشخصية الاولي" width="100%" height="200">
                               <?php else: ?>
                                 <img id="Img_ID_1" src="data/شركات المساهمة/<?php echo $val['Name']; ?>/البطاقة الشخصية/<?php echo $val["id_img_2"] ?>" alt="البطاقة الشخصية الثانية" width="100%" height="200">
                             <?php endif; ?>
                            </div>

                           <div class="change_id_img d-grid gap-2 mx-auto">
                             <button id="ownID_2" type="button" class="btn badge btn-primary btn-float" name="button"> <i class="fa fa-upload"></i>  رفع الصوره </button>
                           </div>
                        </div>
                      </div>

                    </div>

                </div>
                <button id="set_Data" style="display:none" type="submit" name="set_arrw_Comp"></button>
              </form>

              <div class="myModal">

                    <!-- Button trigger modal -->
                    <button type="button" class="btn badge btn-secondary clickModel col-xl-4" data-bs-toggle="modal" data-bs-target="#Arch_file" style="display:block"> <i class="fa fa-upload"></i>رفع ملفات الارشيف</button>

                    <!-- Modal -->
                    <div class="modal fade" id="Arch_file" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel"><?php echo "اضافة شركة جديدة"; ?></h5>
                            <button type="button" class="btn-close btn badge btn-dark ModalClose _Close" data-bs-dismiss="modal" aria-label="Close"> </button>
                          </div>
                          <div class="modal-body">
                            <?php for ($U=1; $U <=10; $U++) { echo $U;
                              ?>
                              <form id="upArchFile_<?php echo $U; ?>" method="post" enctype="multipart/form-data">
                                <div id="OUT_<?php echo $U; ?>" style="display:block;"></div>

                                    <div class="form-group">

                                     <input type="file" class="form-control" name="File_<?php echo $U; ?>" id="File_<?php echo $U; ?>"/>
                                     <input type="submit" style="display:none;" id="SUB_<?php echo $U; ?>" value="Upload" class="btn btn-info"
                                     onclick="sendPBar(<?php echo $U; ?>)"
                                     >

                                     <div class="progress">
                                      <div id="BAR_<?php echo $U; ?>" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" ><span id="pres_<?php echo $U ?>"></span> </div>
                                     </div>

                                    </div>

                               </form>
                              <?php
                            } ?>
                          </div>
                          <div class="modal-footer">
                            <button id="ModalUpload" type="button" class="btn btn-primary ModalUpload"> تحميل </button>
                            <button type="button" class="btn btn-dark ModalClose" data-bs-dismiss="modal">إلغاء</button>
                          </div>
                        </div>
                      </div>
                    </div>

              </div>

              <form id="upimg_1" method="post" style="display:none" enctype="multipart/form-data">
                    <div class="form-group">
                     <input type="file" class="form-control" name="ownID_1" id="Send_ownID_1" accept=".jpg, .png , .jpeg"  />
                    </div>
               </form>
               <form id="upimg_2" method="post" style="display:none" enctype="multipart/form-data">
                     <div class="form-group">
                      <input type="file" class="form-control" name="ownID_2" id="Send_ownID_2" accept=".jpg, .png , .jpeg"  />
                     </div>
                </form>
                <div class="row Btn-Form ">
                  <div class="gap-2 mx-auto Btn-Form col-xl-8 col-11">
                    <button id="add_submit" class="btn btn-primary" type="button"><i class="fa fa-plus"></i> اضافة الشركة </button>
                    <button id="ears" class="btn btn-warning" type="button"><i class="fa fa-eraser "></i> تعديل الكل</button>
                    <button id="GOBACK" class="btn btn-dark" type="button"><i class="fa fa-arrow-circle-o-left"></i> خروج</button>
                  </div>
                </div>
              </div>
        <?php
        }
      }
     ?>

  </div>
</section>

<?php
endif;
  include $tpl. 'footer.inc';
  ob_end_flush();  // Release The Output

 ?>

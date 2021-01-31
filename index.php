
<?php
        ob_start();
session_start();
if (!isset($_SESSION["USERNAME"])):
  header("location:log");
  exit;
  else:
    $pageTitle = 'Archive';
    $body      = 1;
    $noNavbar  = 1;
    $StartUp   = 1;
    include 'inc.php';
    if (!is_dir("data")) {
      mkdir("data");
      mkdir("data/الشركات المساهمة");
    }

?>

    <section class="sec-padding category container">
        <div class="section-header">
            <h2>الأقسام</h2>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-11">
                <div class="offer offer-radius _C1">
                    <div class="overlay"></div>
                        <div class="shape">
                            <div class="shape-text">
                                100
                            </div>
                        </div>
                        <div class="offer-content">
                            <a href="a">
                            <h3 class="lead">
                                الميزانيات العمومية
                            </h3>
                            </a>
                            <a href="b" class="badge bg-light text-dark">
                                اضافة جديدة
                            </a>
                        </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-11">
                <div class="offer offer-radius _C2">
                    <div class="overlay"></div>
                        <div class="shape">
                            <div class="shape-text">
                                <?php
                                  echo $SCount;
                                 ?>
                              </div>
                        </div>
                        <div class="offer-content">
                            <a href="category?cat=stock_Comp">
                            <h3 class="lead">
                                 شركات المساهمة
                            </h3>
                            </a>
                            <a href="category?cat=NewStockC" class="badge bg-light text-dark">
                                اضافة جديدة
                            </a>
                        </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-11">
                <div class="offer offer-radius _C3">
                    <div class="overlay"></div>
                        <div class="shape">
                            <div class="shape-text">
                                100
                            </div>
                        </div>
                        <div class="offer-content">
                            <a href="a">
                            <h3 class="lead">
                                شركات التضامن
                            </h3>
                            </a>
                            <a href="b" class="badge bg-light text-dark">
                                اضافة جديدة
                            </a>
                        </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-11">
                <div class="offer offer-radius _C4">
                    <div class="overlay"></div>
                        <div class="shape">
                            <div class="shape-text">
                                100
                            </div>
                        </div>
                        <div class="offer-content">
                            <a href="a">
                            <h3 class="lead">
                                حسابات الفراد
                            </h3>
                            </a>
                            <a href="b" class="badge bg-light text-dark">
                                اضافة جديدة
                            </a>
                        </div>
                </div>
            </div>
        </div>
    </section>


<?php
endif;
  include $tpl. 'footer.inc';
  ob_end_flush();  // Release The Output

 ?>

<?php
  use GENFun_Class\Fun_Class as FCalss;
  use MyFun_Class\Fun_Class as my_FCalss;
 ?>
<!-- /***************************************************************************/ -->
  <div class="head">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="index">
          <img src="<?php echo $img  ?>Logo/Arch.png" alt="" width="30" height="24" class="d-inline-block align-top">
          الارشيف
        </a>
        <?php
          $userCount = my_FCalss::countItems("ID","users WHERE Gen_Group = 0");
        ?>
        <button class="natfs btn badge btn-primary btn-sm"
        <?php if($userCount==0){echo "disabled";} ?>
        data-bs-toggle = "collapse"
        data-bs-target = "#myNatfs_list"
       aria-expanded="false"
       aria-controls="myNatfs_list"
        type="button" name="button">
          <span>
            <?php if ($userCount>0): ?>
              <small><?php echo $userCount ?></small>
            <?php endif; ?>
            <i class="fa fa-bell-o"></i>
          </span>
        </button>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fa fa-bars"></span>
        </button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">الشركات </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">الأفراد</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">الضرائب</a>
        </li>

      </ul>
        </div>
      </div>
    </nav>
    <div class="natfs_list container">
      <div class="col-xl-5 col-lg-6 col-md-7 col">
        <div class="collapse multi-collapse natfs_list_div" id="myNatfs_list">
          <div class="popover-arrow" style="position: absolute; left: 0px; transform: translate(129px);"></div>
          <div class="card card-body">
            <?php $newUser = GENFun_Class\Fun_Class::getVal("Name,Phone,Date","users","WHERE Gen_Group = 0")  ?>
            <?php foreach ($newUser as $key => $user): ?>
              <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"> مستخدم جديد</h5>
                      <small><?php echo date('Y-m-d',strtotime($user['Date'])) ?></small>
                  </div>
                    <p class="mb-1">لقد تم اضافة مستخدم جديد باسم : <strong> <?php echo $user["Name"] ?> </strong> <br> ورقم هاتف : <strong> <?php echo $user["Phone"] ?> </strong> </p>
                    <small> التاريخ : <?php echo $user["Date"] ?> </small>
                    <div class="natfs_btns">
                      <button class="btn badge btn-primary btn-sm" type="button" name="button">allow <i class="fa fa-check-square-o"></i> </button>
                      <button class="btn badge btn-dark btn-sm" type="button" name="button">block <i class="fa fa-ban"></i> </button>
                      <button class="btn badge btn-danger btn-sm" type="button" name="button">delete <i class="fa fa-trash"></i> </button>
                    </div>
                    </a>
              </div>

            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>



<div class="overlay over_main"></div>

  <!-- /****  START FIXED MENU  ****/ -->

  <nav id="sidebar" class="">

  				<div class="p-4">
  		  		<h1><a href="index" class="logo">
              Archive
              <i class="fa fa-bookmark-o "></i>
            </a></h1>
  	        <ul class="list-unstyled components mb-5">
  	          <li class="">
  	            <a href="index"><span class="fa fa-home mr-3"></span> الرئيسية</a>
  	          </li>
  	          <li>
  	              <a class="downListClick" href="#downList" data-bs-toggle="collapse" aria-expanded="false" aria-controls="downList"><span class="fa fa-building-o mr-3"></span> الشركات</a>
  	          </li>
              <?php
                $SCount = my_FCalss::countItems("ID","stocks");
               ?>
              <div class="collapse downList" id="downList">
                <ul class="list-group">
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="category?cat=stock_Comp">شركات المساهمة</a>
                    <span class="badge bg-primary rounded-pill"><?php echo $SCount; ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    شركات التضامن
                    <span class="badge bg-primary rounded-pill">0</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    شركات التوصية البسيطة
                    <span class="badge bg-primary rounded-pill">0</span>
                  </li>
                </ul>
              </div>
  	          <li>
                <a href="#"><span class="fa fa-users mr-3"></span> الافراد</a>
  	          </li>

  	          <li>
                <a href="logout"><span class="fa fa-sign-out mr-3"></span> تسجيل خروج</a>
  	          </li>
  	        </ul>

  	        <div class="mb-5 div_Search">
  						<h3 class="h6 mb-3">البحث باسم الشخص او اسم المنشأة</h3>
  						<form action="#" class="subscribe-form">
  	            <div class="form-group d-flex">
  	            	<div class="icon"><span class="icon-paper-plane"></span></div>
  	              <input id="_Search" type="text" class="form-control" name="Fixed_Search" placeholder=" ... ادخل الأسم">
  	            </div>
  	          </form>
              <button class="btn badge btn-danger btn-sm close_search" type="button" name="button">
                إاغاء
              </button>
              <div id="out_Search" class="out_Search">
                <a class="def_search no_S" href="#">لم يتم ادخال اسماء</a>
              </div>
  					</div>

  	      </div>
      	</nav>

  <!-- /****  END FIXED MENU  ****/ -->

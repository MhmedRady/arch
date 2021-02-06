
$( document ).ready(function() {
    $('.spinner-wrapper').fadeOut();
  /* SHOW BODY */

'use strict';
feather.replace()

$('#example').DataTable();


/* fadeIn BODY AFTER DATA LOADING */
$('body').fadeIn(1000);
$('.body').animate({
  opacity:1,
},2000);

// ADD ( * ) TO Required INPUT & LABEL ---->

  $('label,input,span').each(function(){
    if ($(this).hasClass('required')) {
        $(this).after('<div class="ast"><span class="asterisk">*</span></div>');
    }
        // $('.requir').after('<span class="asterisk">*</span>');
  });

    function SubClick(click,submit) {
      var click = $(click);
      var submit = $(submit);
      console.log("submit");
      click.on("click",function(){
        submit.click();
      });
    }

function EarseData(btn,input) {
  console.log("earse");
  $(btn).on("click",function(){
    $(input).val("");
  });

}

function goBack(btn) {
  $(btn).on("click",function(){
    history.back();
  });
}

    SubClick("#add_submit","#set_Data");

    EarseData("#ears",".addArrC input");

    goBack("#GOBACK");

    $("#Send_ownID_1").change(function(){
      var val = $("#Send_ownID_1").val();
      $("#ID_img_1").val(val);
    });

    $("#Send_ownID_2").change(function(){
      var val = $("#Send_ownID_2").val();
      $("#ID_img_2").val(val);
    });

/**************************************************/

$(".navbar-toggler").on("click",function(){

  $("#sidebar").addClass("sidebar_collap");

	if($("#sidebar").hasClass("sidebar_collap")){
		console.log("has");
    $("body").addClass("body_Stop");
		$("#sidebar").animate({
			right:"0px",
		});
		$(".over_main").fadeIn(1000);
	}
});

$(".over_main").on("click",function(){
  $("#sidebar").animate({
  right:"-300px",
});
$(this).fadeOut(1000);
  $("#sidebar").removeClass("sidebar_collap");
  $("body").removeClass("body_Stop");
});

$(".div_Search input").on("focus",function(){

  $(".div_Search").animate({
    top: "-250px"
  });
  $(".div_Search button").delay(500).animate({
    bottom:"10px",
  });
  $(".div_Search .out_Search").delay(550).slideDown(1000);
});

$(".div_Search button").on("click",function(){
  $(".div_Search .out_Search").delay(550).slideUp(1000);
  $(this).animate({
    bottom: "40px"
  });
  $(".div_Search").delay(1000).animate({
    top: 0
  });
});

  /******************* LOG PAGE *********************/
  var PASS_INP = $(".pass_input input");
  var PASS_SVG = $(".pass_svg svg");

  PASS_SVG.on("click",function(){
    if ($(this).hasClass("see")) {
      $(this).removeClass("see").siblings().addClass("see");
      if ($(".pass_svg .see").hasClass("un")) {
        PASS_INP.attr("type","text");
      }else {
        PASS_INP.attr("type","password");
      }
    }
  });

  var
   USER_INP,
    USER_ERR,
    PASS_ERR,
  LOG ;

  USER_INP = $(".user_input input");
  USER_ERR = $("#NameHelp");

  PASS_ERR = $("#PassHelp");

  PHONE_INP = $("#exampleInputPhone");
  PHONE_ERR = $("#PhoneHelp");

  USER_INP_VAL = USER_INP.val();
  PASS_INP_VAL = PASS_INP.val();


  USER_STOP = true;
  PASS_STOP = true;
  PHONE_STOP = true;

  LOG = $(".log_card .log");

  /********** STOP COPY & PASTE & CUT **********/

      function NOCOPY(input) {
        input.bind("cut copy paste",function(e) {
          e.preventDefault();
        });
      }

  function seeERR(err,val){
    err.delay(500).fadeIn();
    err.html('<i class="fa fa-times"></i> '+val);
    // err;
  }

  function hideERR(err) {
    err.fadeOut();
    err.html("");
  }

  function errRegExp(VAL) {
    var pat = new RegExp(/^[a-zA-Z]*$/);
    var OutTest = pat.test(VAL);
    return OutTest;
  }

 REG = $("#regest");

  LOG.on("click",function(){

    PASS_VAL = $("#exampleInputPass").val();

    var fvalN = USER_INP.val().length,
        USER_INP_VAL = USER_INP.val();

    if (PASS_VAL.length == 0 ) {
      PASS_STOP = true;
      seeERR(PASS_ERR,"ادخل كلمة المرور");
    }else {
      hideERR(PASS_ERR);
      PASS_STOP = false;
    }
console.log("=>>>>> " + errRegExp(USER_INP_VAL));
    if (fvalN==0 ) {

      USER_STOP = true;
      seeERR(USER_ERR,"لم يتم ادخال اسم المستخدم");

    } else if (!errRegExp(USER_INP_VAL)) {

       USER_ERR.addClass("erro");
       seeERR(USER_ERR,"اسم المستخدم لا يحتوي علي '($+-/*.@#!~9-0)'");
              USER_STOP = true;

    }else if(USER_INP.hasClass("checkError")) {

      USER_STOP = true;
      seeERR(USER_ERR,"هذا المستخدم غير موجود ");

    } else {
      hideERR(USER_ERR);
      USER_STOP = false;
    }

  });

  REG.on("click",function(){

    var PHONE_INP_VAL = $("#exampleInputPhone").val();
    PASS_INP_R = $(".regest #exampleInputPass");
    PASS_INP_R_VAL = PASS_INP.val();

    PASS_INP_VAL_2 = $("#exampleInputPass_2").val();

    var firstarray = ['1','2','3','4','5','6','7','8','9','0','۰', '۱', '۲', '۳', '٤','٥','٦','۸', '۹','/','*','!','<','>','(',')','.','-','+','=','÷','{','}','?',':',';','@','#','$','%','^','&','_','.','؟',','];

    var fvalN = USER_INP.val().length,
        USER_INP_VAL = USER_INP.val();


    if (PASS_INP_R_VAL.length == 0 || PASS_INP_VAL_2.length == 0) {
      PASS_STOP = true;
      seeERR(PASS_ERR,"ادخل كلمة المرور");
    }else if (PASS_INP_R_VAL.length !== PASS_INP_VAL_2.length || PASS_INP_R_VAL !== PASS_INP_VAL_2) {
      PASS_STOP = true;
      seeERR(PASS_ERR,"كلمة السر غير متطابقة");
    }
    else {
      hideERR(PASS_ERR);
      PASS_STOP = false;
    }
    if (PHONE_INP_VAL.length !== 14) {
      seeERR(PHONE_ERR,"رقم الهاتف غير صحيح");
      PHONE_STOP = true;
    }else {
      hideERR(PHONE_ERR);
      PHONE_STOP = false;
    }
    if (fvalN==0 ) {
      USER_STOP = true;
      seeERR(USER_ERR,"لم يتم ادخال اسم المستخدم");

    } else if (fvalN > 0 ) {
          for (var i = 0; i < fvalN; i++) {
              var fval = USER_INP.val().charAt(i);
              var num = 0 ;
             if ($.inArray(fval, firstarray) >= 0) {
               var num = 1;
             }else {
               var num = 0;
             }
          if (num==0) {
                hideERR(USER_ERR);
                   USER_STOP = false;
           }else if (num==1) {
             seeERR(USER_ERR,"اسم المستخدم لا يحتوي علي '($+-/*.@#!~9-0)'");
                   USER_STOP = true;
                   return;
              }
          }

    }

  });

var LOGSUB = $("#LOGForm");

  LOGSUB.submit(function(event){
    console.log(USER_STOP,PASS_STOP);
    if (USER_STOP == true ||
        PASS_STOP == true
      ) {
        event.preventDefault();
    }
  });

$( "#IndexDate" ).datepicker();

$(".ui-datepicker-prev").children().remove();
$(".ui-datepicker-prev").html("<span class='fa fa-chevron-left'></span>");

$(".ui-datepicker-next").children().remove();
$(".ui-datepicker-next").html("<span class='fa fa-chevron-right'></span>");

var allowUp = true;

function UPLODED(input) {
  $(input).change(function () {
        var fileExtension = ['jpeg', 'jpg', 'png'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            $(this).val('');
              allowUp = true;
            $('#image_demo').children().remove();
            alert(" صيغة هذا الملف غير مدعومة فقط استخدم  : [ "+fileExtension.join(', ')+' ]');
        }else {
          allowUp = false;
        }
        console.log("allowUp => " + allowUp);
    });
}


function setImg(btn,input,form) {

  var btn = $(btn);
  var inputS = $(input);
  var formS = $(form);

  btn.on('click',function(){
    UPLODED(input);
    inputS.click();
    inputS.change(function(){
      if (allowUp == false) {
        formS.submit();
        allowUp = true;
      }
    });
  });
}

setImg("#ownID_1","#Send_ownID_1","#upimg_1");

setImg("#ownID_2","#Send_ownID_2","#upimg_2");


// $('#ModalUpload').click(function(){
//   for (var i = 1; i < 11; i++) {
//     $('#SUB_'+i).click();
//     $('#SUB_'+i).on("click",function(){
//       var post_img = $('#File_'+i).val();
//       if (post_img !=='') {
//         console.log(post_img );
//         $('#BAR_'+i).on('change width',function(){
//           var barW = $('#BAR_'+i).width()+'%';
//           console.log(barW);
//           $('pres_'+i).html(barW);
//         });
//       }
//     });
//
//
//   }
// });

$('#ModalUpload').click(function(){
  for (var i = 1; i < 11; i++) {
    $('#SUB_'+i).click();
    var post_img = $('#File_'+i).val();
    if (post_img !=='') {
      // $('#BAR_'+i).css("width","0");
      $('#BAR_'+i).on('change width',function(){
        var barW = $('#BAR_'+i).width()+'%';
        console.log(barW);
        $('pres_'+i).html(barW);
      });
      console.log("file up file"+i);
    }else {
      console.log("empty file");
    }

  }
});


  /* NUMERIC VALUES ID */

   $(".Numeric").keydown(function (e) {
       if ((e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
         (e.keyCode >= 35 && e.keyCode <= 40) ||
         $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1) {
         return;
      }
      if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) &&
         (e.keyCode < 96 || e.keyCode > 105)) {
          e.preventDefault();
      }
   });

/**********************************************/

});

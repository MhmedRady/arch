

// /* START CROPE MEMBER IMG */

        /**  *  **/
var pOST  = 'includes/libraries/live/check?check=Ckc!&page=';

var uPLd  = 'includes/libraries/Up/upload_file?addLoad=';

// var uArch = 'includes/libraries/Up/aRchFiles?up';

  /************* START [ CHECK LOGIN USERNAME NAME ]  ************/

var userin = $('#user-log'),

    erro=true;

  function checkdata(id,val,page,name) {
    console.log('check');
    var
     id = $(id).val(),
     valu = $(val);

    jQuery.ajax({
  	url: pOST+page,
  	data:name+'='+id,
  	type: "POST",
  	success:function(data){
  		valu.html(data);
    },
  	 error:function (){}
  	});

  }

  $("#logBTN, #exampleInputName").on("click blur",function(){

    var userInput = $("#exampleInputName");
    var userVal = userInput.val();
    if (userVal!="") {
      checkdata("#exampleInputName","#NameCheckHelp","logForm","logName");
    }

        if ($("#NameHelp").hasClass("checkError")) {
          console.log("has class checkError");
        }else {
          console.log("no class checkError");
        }

  });

  function goArch(id){
    var val = $(id).val();
    checkdata(id,"#TAG","gpArch","goArch");
  };

  function myConfirm(id,name){

    Swal.fire({
      title: "هل تريد حذف شركة "+name,
      text: "عملية الحذف تتضمن حذف جميع ملفات الارشيف !",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#00779b',
      cancelButtonColor: 'rgb(38, 38, 38)',
      confirmButtonText: 'حذف !',
      cancelButtonText: 'الغاء'

    }).then((result) => {
      console.log("result.value =>"+result.value);
      if (result.value) {
        checkdata(id,"#TAG","DelComp","trash")
        Swal.fire(
          "تم حذف الشركة بنجاح"
        )
      }
    });

  }
  $("#_Search").on("keydown",function(){
    var len = $(this).val().length;
    if (len>1) {
      checkdata("#_Search","#out_Search","_S","Fixed_Search");
    }
  });

  function delComp(id) {
    var val = $(id).val();
    console.log("deleting val => " + val);
    myConfirm(id,val);
  }

function ImgSub(form,out,page) {
var form = $(form);
var out  = $(out);

  form.on('submit',(function(e){
    console.log("submit =>");
  e.preventDefault();
  $.ajax({
  url: uPLd+page,
  type: "POST",
  data:  new FormData(this),
  contentType: false,
  cache: false,
  processData:false,
  success: function(data){
    console.log("new img");
  out.html(data);
  },
  error: function(){}
  });
  }));

}

  /******* ** UPLODED TEMP DATA PROGRESS BAR ** ******/

  /********** UPLODE PROGRESS **********/

      function  progBAR(fRm,input,out,up,bar,prs){

      /**************************/
      var from = $(fRm),
      btn= $(btn),
      input = $(input),
      output = $(out);
      var bar = $(bar);
      from.submit(function(event){
      event.preventDefault();
      if(input.val()!=='')
      {

      var percent = $(prs);
      event.preventDefault();
      bar.show();
      output.hide();
      $(this).ajaxSubmit({
      target: out,
      url:uPLd+"aRchs&Files="+up,
      beforeSubmit:function(){
      var percentVal = '0%';
      bar.width(percentVal)
      percent.html(percentVal);
      },
      uploadProgress: function(event, position, total, percentageComplete)
      {
      var percentVal = percentageComplete + '%';
      percent.html(percentVal);

      bar.animate({
      width: percentVal + '%'
      }, {
      duration: 1000
      });

      },
      success:function(){

      var percentVal = '100%';
      bar.width(percentVal)
      percent.html(percentVal);

      output.fadeIn(1000);
      },
      resetForm: true
      });
      }
      return false;
      });


      /*************************/
      }


/**********************************************/

function sendPBar(num){
  for (var i = 1; i < 11; i++) {

    progBAR('#upArchFile_'+i,'#File_'+i,'#OUT_'+i,'uPFile_'+i,'#BAR_'+i,'#pres_'+i);

  }
}

/**********************************************/
// function  progBAR(fRm,input,out,up,bar,prs){
//
// /**************************/
// var from = $(fRm),
// btn= $(btn),
// input = $(input),
// output = $(out);
// var bar = $(bar);
// from.submit(function(event){
// event.preventDefault();
// if(input.val()!=='')
// {
// console.log("progBAR function");
// var percent = $(prs);
// event.preventDefault();
// bar.show();
// // output.hide();
// $(this).ajaxSubmit({
// // target: out,
// url:uPLd+"aRchs",
// beforeSubmit:function(){
// var percentVal = '0%';
// bar.width(percentVal)
// percent.html(percentVal);
// },
// uploadProgress: function(event, position, total, percentageComplete)
// {
// var percentVal = percentageComplete + '%';
// percent.html(percentVal);
//
// bar.animate({
// width: percentVal + '%'
// }, {
// duration: 1000
// });
//
// },
// success:function(){
//
// var percentVal = '100%';
// bar.width(percentVal)
// percent.html(percentVal);
//
// // output.fadeIn(1000);
// },
// resetForm: true
// });
// }
// return false;
// });
//
//
// /*************************/
// }


$(document).ready(function(){

    $(".addArrC").submit(function(event){
        event.preventDefault(); //prevent default action
        var post_url = pOST+'addComp'; //get form action url
        var request_method = $(this).attr("method"); //get form GET/POST method
    	  var form_data = new FormData(this); //Creates new FormData object
        $.ajax({
            url : post_url,
            type: request_method,
            data : form_data,
    		contentType: false,
    		cache: false,
    		processData:false
        }).done(function(response){ //
            $("#GET").html(response);
        });
    });

for (var i = 1; i <3; i++) {
  ImgSub("#upimg_"+i,".ID_"+i,"uPIDImg");
}



  console.log('ajax');
});

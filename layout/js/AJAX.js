
/**** ** *  * ** ****/

var userin = $('#user-log'),
    erro=true;
  function checkName() {

  	jQuery.ajax({
  	url: "includes/libraries/live/check.php?check=Ckc!&page=Chcusr",
  	data:'user-log='+$("#user-log").val(),
  	type: "POST",
  	success:function(data){
  		$("#name_veu").html(data);
    },
  	 error:function (){}
  	});
  }

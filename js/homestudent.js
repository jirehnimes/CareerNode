$(document).ready(function(){

	$("#studentnav").hide();

	if(status == "NULL"){
		$("#content").show();
	}else{
		$("#content").hide();
	}

	$("#find").click(function(){
		$("#content").hide();
		$("#studentnav").show();
		$.whatever();
	});
});







$("#rSubmit").on("click", function(e){

	var username = $("#user").val();
	var email = $("#email").val();
	var password = $("#pass").val();
	var confirm = $("#confirm").val();
	var avatar = $("#avatar").val();
	var valid = true;


	if (username.length < 5){
		$("#userTag").css("display", "inline-block");
		$("#user").css({"outline-color":"red", "border-color":"red"});
		valid = false;
	}
	else{
		$("#user").css({"outline-color":"green", "border-color":"green"});
		$("#userTag").hide();

	}
	if (email.length < 5 || !(email.includes("@")) || !(email.substr(email.lastIndexOf("@")).includes("."))){
		$("#emailTag").css("display", "inline-block");
		$("#email").css({"outline-color":"red", "border-color":"red"});
		valid = false;
	}
	else{
		$("#email").css({"outline-color":"green", "border-color":"green"});
		$("#emailTag").hide();
	}
	if (password.length < 6){
		$("#passTag").css("display", "inline-block");
		$("#pass").css({"outline-color":"red", "border-color":"red"});
		valid = false;
	}
	else{
		$("#pass").css({"outline-color":"green", "border-color":"green"});
		$("#passTag").hide();

	}

	if (!confirm || (password != confirm)){
		$("#confirmTag").css("display", "inline-block");
		$("#confirm").css({"outline-color":"red", "border-color":"red"});
		valid = false;
	}
	else{
		$("#confirm").css({"outline-color":"green", "border-color":"green"});
		$("#confirmTag").hide();
	}
	if(!validateFile(avatar)){
		$("#avatarTag").css("display", "inline-block");
		$("#avatar").css({"outline-color":"red", "border-color":"red"});
		valid = false;
	}
	else{
		$("#avatar").css({"outline-color":"green", "border-color":"green"});
		$("#avatarTag").hide();
	}
	if(valid){	
		if(window.confirm(
			"Form Sumbmitted" + "\n" +
			"\n" +
			"Username: " + username + "\n" +
			"Avatar: " + avatar + "\n")==false)
			e.preventDefault();
	}
	else{
		e.preventDefault();
	}
});

$("#reset").on("click", function(e){

	$(".tag").css("display", "none");
	$("#rForm input:not([type=submit]):not([type=reset]").css({"border-color":"#999","outline-color":"rgb(77, 144, 254)"})

});

$("#user").keyup(function(){
	if ($(this).val().length < 5){
		$("#userTag").css("display", "inline-block");
		$(this).css({"outline-color":"red", "border-color":"red"});
	}
	else{
		$(this).css({"outline-color":"green", "border-color":"green"});
		$("#userTag").hide();

	}

	if($(this).val().length == 0){
		$(this).css({"outline-color":"transparent", "border-color":"rgb(153, 153, 153)"});
		$("#userTag").hide();
	}
});

$("#email").keyup(function(){
	if ($(this).val().length < 5 || !($(this).val().includes("@")) || !($(this).val().substr($(this).val().lastIndexOf("@")).includes("."))){
		$("#emailTag").css("display", "inline-block");
		$(this).css({"outline-color":"red", "border-color":"red"});
	}
	else{
		$(this).css({"outline-color":"green", "border-color":"green"});
		$("#emailTag").hide();

	}

	if($(this).val().length == 0){
		$(this).css({"outline-color":"transparent", "border-color":"rgb(153, 153, 153)"});
		$("#emailTag").hide();
	}
});

$("#pass").keyup(function(){
	if ($(this).val().length < 6){
		$("#passTag").css("display", "inline-block");
		$(this).css({"outline-color":"red", "border-color":"red"});
	}
	else{
		$(this).css({"outline-color":"green", "border-color":"green"});
		$("#passTag").hide();
	}
	
	if($(this).val().length == 0){
		$(this).css({"outline-color":"transparent", "border-color":"rgb(153, 153, 153)"});
		$("#passTag").hide();
	}

	if ($("#pass").val() != $("#confirm").val() && $("#confirm").val()) {
		$("#confirmTag").css("display", "inline-block");
		$("#confirm").css({"outline-color":"red", "border-color":"red"});
	}
	else if($("#pass").val() == $("#confirm").val() && $(this).val().length > 5 ){
		$("#confirm").css({"outline-color":"green", "border-color":"green"});
		$("#confirmTag").hide();
	}
});


$("#confirm").keyup(function(){
	if (!$(this).val() || $("#pass").val() != $(this).val()){
		$("#confirmTag").css("display", "inline-block");
		$("#confirm").css({"outline-color":"red", "border-color":"red"});
	}
	else{
		$("#confirm").css({"outline-color":"green", "border-color":"green"});
		$("#confirmTag").hide();
	}
});

$("#avatar").on("change",function(){
	if (!validateFile($(this).val())){
		$("#avatarTag").css("display", "inline-block");
		$("#avatar").css({"outline-color":"red", "border-color":"red"});
	}
	else{
		$("#avatar").css({"outline-color":"green", "border-color":"green"});
		$("#avatarTag").hide();
	}
});


function validateFile(fileName)
{
	var allowed_extensions = new Array("jpg","jpeg","png","gif");
	// split function will split the filename by dot(.), and pop function will pop the last element from the array which will give you the extension as well. 
	//If there will be no extension then it will return the filename. 
	var file_extension = fileName.split('.').pop(); 

	for(var i = 0; i < allowed_extensions.length; i++)
	{
		if(allowed_extensions[i]==file_extension)
		{	
			//valid file extension
			return true; 
		}
	}
	return false;
}




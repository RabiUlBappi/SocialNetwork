$(document).ready(function(){
	$("#signup_submit").click(function(){
		var name = $("#name").val();
		var email = $("#email").val();
		var pwd = $("#pwd").val();
		var cpwd = $("#cpwd").val();

		if(pwd != cpwd){ 
			$("#pwd").val('');
			$("#cpwd").val('');
			alert("Password doesn't match! Give again.");
		}
		else if(name==''||email==''||pwd==''||cpwd==''){
			alert("Please Fill All Fields");
		}
		else{
			// AJAX Code To Submit Form
			var link = "public/signup.php";
			var dataString = 'user_name='+ name + '&user_email='+ email + '&user_pwd='+ pwd;
			call_ajax("POST",link, dataString);
		}
	});

	$("#signin_submit").click(function(){
		var email = $("#signin_email").val();
		var pwd = $("#signin_pwd").val();

		if(email==''||pwd==''){
			alert("Please fill all the fields");
		}
		else{
			// AJAX Code To Submit Form
			var link = "public/signin.php";
			var redirect = true;//"//localhost/SocialNetwork/";
			var dataString = 'user_signin_email='+ email + '&user_signin_pwd='+ pwd;
			call_ajax("POST", link, dataString, redirect);
		}
	});

	$("#signout_submit").click(function(){
		// AJAX Code To Submit Form
		var link = "public/signout.php";
		var redirect = true;//"//localhost/SocialNetwork/";
		call_ajax("POST", link, redirect);
	});

	function call_ajax(method="POST",link='', dataString='', redirect='') {
		$.ajax({
			type: method,
			url: link,
			data: dataString,
			cache: false,
			success: function(response){
				if(response.length > 0){ 
				 	alert(response);
				}
				else{
					//redirect.length > 0
					//alert("You will now be redirected.");
					//window.location.href = redirect;
					window.location.reload();
					//$(location).attr('href',redirect);
				}
			},
            failure: function (response) {
                alert(response);
            }
		});
	}
});
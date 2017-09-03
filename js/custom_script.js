$(document).ready(function(){
	$("#signup_submit").click(function(){
		var name = $("#name").val();
		var email = $("#email").val();
		var pwd = $("#pwd").val();
		var cpwd = $("#cpwd").val();

		if(pwd != cpwd){ 
			alert("Password doesn't match! Give again.");
		}
		else if(name==''||email==''||pwd==''||cpwd==''){
			alert("Please Fill All Fields");
		}
		else{
			// AJAX Code To Submit Form
			var dataString = 'user_name='+ name + '&user_email='+ email + '&user_pwd='+ pwd;
			call_ajax("POST","includes/signup.php", dataString);
		}
	});

	$("#signin_submit").click(function(){
		var email = $("#signin_email").val();
		var pwd = $("#signin_pwd").val();

		if(email==''||pwd==''){
			alert("Please Fill All Fields");
		}
		else{
			// AJAX Code To Submit Form
			var dataString = 'user_signin_email='+ email + '&user_signin_pwd='+ pwd;
			call_ajax("POST","includes/signin.php", dataString);
		}
	});

	function call_ajax(method="POST",link='', dataString='') {
		$.ajax({
			type: method,
			url: link,
			data: dataString,
			cache: false,
			success: function(result){
				alert(result);
			}
		});
	}
});
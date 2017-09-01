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
			$.ajax({
				type: "POST",
				url: "includes/signup.php",
				data: dataString,
				cache: false,
				success: function(result){
					alert(result);
				}
			});
		}
	});
});
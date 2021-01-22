$(function() {
	$("form").submit(function() {
		let LoginData = {
			email: $("input[name='email']").val(),
			password: $("input[name='pw']").val()
		}
		
		let ManageLogin = function (error) {
			if (error != null) {
				alert("Email e/o password errati!");
			} else {
				Windows.location(".../.../Site/Home/home.php");
			}
		}

		$.post(".../.../ApiAJAX/Login/loginCheck.php", LoginData, ManageLogin, "json");
	});
});
$(function() {
	$("form").submit(function() {
		let LoginData = {
			email: $("input[name='email']").val(),
			password: $("input[name='pw']").val()
		}
		
		let ManageLogin = function (error) {
			if (error != null) {
				$(".errori").html("<p><strong>Attenzione, e-mail o password errati</p></strong>");
			} else {
				Windows.location(".../.../PHP/Site/Monkas/Home/home.php");
			}
		}

		$.post(".../.../ApiAJAX/Login/loginCheck.php", LoginData, ManageLogin, "json");
	});
});
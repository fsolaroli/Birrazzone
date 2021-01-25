$(function() {
	$("form").submit(function() {
		let LoginData = {
			username: $("input[name='username']").val(),
			pw: $("input[name='pw']").val()
		}

		let ManageLogin = function (data) {
			if (data != null) {
				$(".error").html("<p><strong>Attenzione, e-mail o password errati</strong></p>");
			} else {
				window.location = "../AdminProfile/adminNotifications.php";
			}
		}

		$.post("../../ApiAJAX/Login/adminLoginCheck.php", LoginData, ManageLogin, "json");
	});
});
$(function() {
	$("form").submit(function() {
		let LoginData = {
			email: $("input[name='username']").val(),
			password: $("input[name='pw']").val()
		}
		
		let ManageLogin = function(error, name) {
			if(error != null) {
				alert("Username e/o password errati!");
			} else {
				$("main").html(`<h2>Benvenuto${name}!</h2>`);
				$("main").html(`a href='home.php'>Vai alla home</a>`);
			}
		}
		$.post(".../.../ApiAJAX/Login/loginCheck.php", LoginData, ManageLogin, "json");
	});
});
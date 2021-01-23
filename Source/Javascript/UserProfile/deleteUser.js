$(function() {
	$("main").click(function (e) {
		$("#deleteAccount").removeAttr("disabled");
		$("#deleteAccountConfermation").hide("slide");
	});

	$("#deleteAccount").click(function(e) {
		e.stopPropagation();
		$("#deleteAccountConfermation").show("slide");
		$(this).attr("disabled", "true");
	});

	$("#deleteAccountConfermation").click(function (e) { 
		$.post("../../ApiAJAX/UserProfile/deleteUser.php", function() {
			$("main > section").html(`
				<h2>Account cancellato</h2>
				<a href="../Home/home.php"><button>OK</button></a>
			`);
		});	
	});
})
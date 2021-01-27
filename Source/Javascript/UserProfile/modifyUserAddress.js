$(function() {
	$(":submit[name='update']").click(function() {
		let UserData = {
			via: $("input[name='Via']").val(),
			citta: $("input[name='Citta']").val(),
			provincia: $("input[name='Provincia']").val(),
			cap: $("input[name='CAP']").val()
		}

		let ManageUpdate = function(errors) {
			if(errors!=null) {
				$(".errors > ul").html("")
				$.each(errors, function (i, val) { 
					$(".errors > ul").append("<li><strong>"+val+"</strong></li>");	 
				});
			} else {
				window.location = "userAddress.php";
			}
		}

		$.post("../../ApiAJAX/UserProfile/modifyUserAddressCheck.php", UserData, ManageUpdate, "json");
	});

	$(":submit[name='undo']").click(function() {
		window.location = "userAddress.php";
	});
});
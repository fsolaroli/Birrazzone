$(function() {
	$(":submit[name='update']").click(function() {
		let UserData = {
			name: $("input[name='name']").val(),
			email: $("input[name='email']").val(),
			pw: $("input[name='pw']").val(),
			confirmpw: $("input[name='confirmpw']").val()
		}

		let ManageUpdate = function(errors) {
			if(errors!=null) {
				$(".errors > ul").html("")
				$.each(errors, function (i, val) { 
					$(".errors > ul").append("<li><strong>"+val+"</strong></li>");	 
				});
			} else {
				window.location = "userProfileData.php";
			}
		}

		$.post("../../ApiAJAX/UserProfile/modifyUserProfileDataCheck.php", UserData, ManageUpdate, "json");
	});

	$(":submit[name='undo']").click(function() {
		window.location = "userProfileData.php";
	});
});
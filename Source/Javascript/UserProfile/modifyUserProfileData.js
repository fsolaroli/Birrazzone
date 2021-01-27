$(function() {
	$(":submit[name='updateData']").click(function() {
		let UserData = {
			name: $("input[name='name']").val(),
			email: $("input[name='email']").val()
		}

		let ManageUpdate = function(errors) {
			if(errors!=null) {
				$("section:first-of-type > .errors > ul").html("")
				$.each(errors, function (i, val) { 
					$("section:first-of-type > .errors > ul").append("<li><strong>"+val+"</strong></li>");	 
				});
			} else {
				window.location = "userProfileData.php";
			}
		}

		$.post("../../ApiAJAX/UserProfile/modifyUserProfileDataCheck.php", UserData, ManageUpdate, "json");
	});

	$(":submit[name='updatePassword']").click(function() {
		let UserPassword = {
			pw: $("input[name='pw']").val(),
			confirmpw: $("input[name='confirmpw']").val()
		}

		let ManageUpdatePassword = function(errors) {
			if(errors!=null) {
				$("section:last-of-type > .errors > ul").html("")
				$.each(errors, function (i, val) { 
					$("section:last-of-type > .errors > ul").append("<li><strong>"+val+"</strong></li>");	 
				});
			} else {
				$("input[type='password']").val("");
				$("section:last-of-type > .errors > ul").html("<li>Password modificata</li>");			
			}
		}

		$.post("../../ApiAJAX/UserProfile/modifyUserPassword.php", UserPassword, ManageUpdatePassword, "json");
	});

	$(":submit[name='undo']").click(function() {
		window.location = "userProfileData.php";
	});
});
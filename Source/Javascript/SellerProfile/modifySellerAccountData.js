$(function() {
	$(":submit[name='updateData']").click(function() {
		let PostData = 	{
			sellerName: $("input[name='sellerName']").val(),
			email: $("input[name='email']").val(),
			IVA: $("input[name='IVA']").val()
		}
		let PostFunction = function(errors) {
			if(errors!=null) {
				$("section:first-of-type > .errors > ul").html("")
				$.each(errors, function (i, val) { 
					$("section:first-of-type > .errors > ul").append("<li><strong>"+val+"</strong></li>");	 
				});
			} else {
				window.location="SellerAccountData.php"
			}
		}
		$.post(	"../../ApiAJAX/SellerProfile/modifySellerAccountData.php", PostData, PostFunction, "json");
	});

	$(":submit[name='updatePassword']").click(function() {
		let PostData = 	{
			password: $("input[name='password']").val(),
			passwordConfermation: $("input[name='passwordConfermation']").val()
		}	

		let PostFunction = function(errors) {
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
		$.post(	"../../ApiAJAX/SellerProfile/modifySellerPassword.php", PostData, PostFunction, "json");
	});

	$(":submit[name='cancel']").click(function (e) { 
		window.location="SellerAccountData.php"
	});
});
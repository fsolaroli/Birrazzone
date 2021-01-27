$(function() {
	$(":submit[name='update']").click(function() {
		let PostData = 	{
			sellerName: $("input[name='sellerName']").val(),
			email: $("input[name='email']").val(),
			IVA: $("input[name='IVA']").val(),
			password: $("input[name='password']").val(),
			passwordConfermation: $("input[name='passwordConfermation']").val()
		}
		let PostFunction = function(errors) {
			if(errors!=null) {
				$(".errors > ul").html("")
				$.each(errors, function (i, val) { 
					$(".errors > ul").append("<li><strong>"+val+"</strong></li>");	 
				});
			} else {
				window.location="SellerAccountData.php"
			}
		}
		$.post(	"../../ApiAJAX/SellerProfile/modifySellerAccountData.php", PostData, PostFunction, "json");
	});

	$(":submit[name='cancel']").click(function (e) { 
		window.location="SellerAccountData.php"
	});
});
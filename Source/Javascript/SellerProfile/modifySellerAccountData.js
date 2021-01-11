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
				$(".errori").html("")
				$.each(errors, function (i, val) { 
					$(".errori").append("<p><strong>"+val+"</strong></p>");	 
				});
			} else {
				window.location="SellerProfile.php"
			}
		}
		$.post(	"../ApiAJAX/modifySellerAccountData.php", PostData, PostFunction, "json");
	});
	
	$(":submit[name='cancel']").click(function() {
		window.location="SellerProfile.php"	
	});

});
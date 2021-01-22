$(function() {
	$(":file").change(function (e) {
		uploadImage("Birre");
	});

	$(":submit").click(function() {
		let PostData = {
			productId: $("input[name='productId']").val(),
			imagePath: $("form > ul > li > img").attr("src"),
			price: $("input[name='price']").val(),
			description: $("input[name='description']").val(),
		}
		let PostFunction = function(errors) {
			if(errors!=null) {
				$(".errori").html("")
				$.each(errors, function(i, val) { 
					$(".errori").append("<p><strong>"+val+"</strong></p>");	 
				});
			} else {
				window.location="productPage.php?productId=" + $("input[name='productId']").val()
			}
		}
		$.post(	"../../ApiAJAX/SellerProfile/modifyProduct.php", PostData, PostFunction, "json");
	});

	$(":submit[name='cancel']").click(function (e) { 
		window.location="SellerAccountData.php"
	});
});
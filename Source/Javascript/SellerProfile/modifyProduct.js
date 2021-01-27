$(function() {
	$(":file").change(function (e) {
		uploadImage("Birre");
	});

	$(":submit").click(function() {
		let PostData = {
			productId: $("input[name='productId']").val(),
			imagePath: $("form > ul > li > img").attr("src"),
			price: $("input[name='price']").val(),
			description: $("textarea[name='description']").val(),
		}
		let PostFunction = function(errors) {
			if(errors!=null) {
				$(".errors > ul").html("")
				$.each(errors, function(i, val) { 
					$(".errors > ul").append("<li><strong>"+val+"</strong></li>");	 
				});
			} else {
				window.location="productPage.php?productId=" + $("input[name='productId']").val()
			}
		}
		$.post(	"../../ApiAJAX/SellerProfile/modifyProduct.php", PostData, PostFunction, "json");
	});

	$(":submit[name='cancel']").click(function (e) { 
		window.location="productPage.php?productId="+$("input[name='productId']").val();
	});
});
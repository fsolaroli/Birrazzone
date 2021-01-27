$(function() {
	$(":file").change(function (e) {
		uploadImage("Birre");
	});

	$(":submit").click(function() {
		let PostData = {
			name: $("input[name='name']").val(),
			type: $("input[name='type']").val(),
			imagePath: $("form > ul > li > img").attr("src"),
			price: $("input[name='price']").val(),
			format: $("input[name='format']").val(),
			alcholic: $("input[name='alcholic']").val(),
			color: $("input[name='color']").val(),
			description: $("textarea[name='description']").val(),
		}
		let PostFunction = function(errors) {
			if(errors!=null) {
				$(".errors > ul").html("")
				$.each(errors, function(i, val) { 
					$(".errors > ul").append("<li><strong>"+val+"</strong></li>");	 
				});
			} else {
				window.location="sellerProducts.php"
			}
		}
		$.post(	"../../ApiAJAX/SellerProfile/addProduct.php", PostData, PostFunction, "json");
	});

	$(":submit[name='cancel']").click(function (e) { 
		window.location="SellerProducts.php"
	});
});
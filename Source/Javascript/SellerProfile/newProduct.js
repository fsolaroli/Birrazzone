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
			description: $("input[name='description']").val(),
		}
		let PostFunction = function(errors) {
			if(errors!=null) {
				$(".errori").html("")
				$.each(errors, function(i, val) { 
					$(".errori").append("<p><strong>"+val+"</strong></p>");	 
				});
			} else {
				window.location="sellerProducts.php"
			}
		}
		$.post(	"../../ApiAJAX/SellerProfile/addProduct.php", PostData, PostFunction, "json");
	});
});
$(function() {
	$(":file").change(function (e) {
		uploadImage("Birrifici");
	});

	$(":submit").click(function() {
		let PostData = {
			location: $("input[name='location']").val(),
			imagePath: $("form > ul > li > img").attr("src"),
			description: $("textarea[name='description']").val(),
		}
		let PostFunction = function(errors) {
			if(errors!=null) {
				$(".errors").html("")
				$.each(errors, function(i, val) { 
					$(".errors").append("<p><strong>"+val+"</strong></p>");	 
				});
			} else {
				window.location="sellerProfileData.php"
			}
		}
		$.post(	"../../ApiAJAX/SellerProfile/modifySellerProfileData.php", PostData, PostFunction, "json");
	});
	
	$(":submit[name='cancel']").click(function (e) { 
		window.location="SellerAccountData.php"
	});
});
$(function() {
	$(":submit[name='update']").click(function() {
		let PostData = 	{
			location: $("input[name='location']").val(),
			image: $("input[name='image']").val(),
			description: $("input[name='description']").val(),
		}
		let PostFunction = function(errors) {
			if(errors!=null) {
				$(".errori").html("")
				$.each(errors, function (i, val) { 
					$(".errori").append("<p><strong>"+val+"</strong></p>");	 
				});
			} else {
				window.location="sellerAccountData.php"
			}
		}
		$.post(	"../ApiAJAX/modifySellerProfileData.php", PostData, PostFunction, "json");
	});
});
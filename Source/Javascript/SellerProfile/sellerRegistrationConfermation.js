$(function() {
	$(":submit").click(function() {
		let PostData = 	{
							sellerId: $("input[name='sellerId']").val(),
							password: $("input[name='password']").val(),
							passwordConfermation: $("input[name='passwordConfermation']").val()
						}
		let PostFunction = function (errors) {
			if(errors!=null) {
				$(".errors > ul").html("")
				$.each(errors, function (i, val) { 
					$(".errors > ul").append("<li><strong>"+val+"</strong></li>");	 
				});
			} else {
				$("main").html(`
				<h1>Registrazione birrificio</h1>
				<h2>Registrazione Completata</h2>
				<a href="../SellerProfile/sellerNotifications.php"><button>OK</button></a>
				`);
			}
		}
		$.post(	"../../ApiAJAX/SellerProfile/sellerRegistrationConfermation.php", PostData, PostFunction, "json");		
	});
});
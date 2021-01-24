$(function() {
	$(":submit").click(function() {
		let PostData = 	{
							sellerId: $("input[name='sellerId']").val(),
							password: $("input[name='password']").val(),
							passwordConfermation: $("input[name='passwordConfermation']").val()
						}
		let PostFunction = function (errors) {
			if(errors!=null) {
				$(".errors").html("")
				$.each(errors, function (i, val) { 
					$(".errors").append("<p><strong>"+val+"</strong></p>");	 
				});
			} else {
				$("main").html(`
				<h1>Registrazione birrificio</h1>
				<h2>Registrazione Completata</h2>
				<form action="sellerAccount.php">
					<input type="submit" value="OK"/>
				</form>
				`);
			}
		}
		$.post(	"../../ApiAJAX/SellerProfile/sellerRegistrationConfermation.php", PostData, PostFunction, "json");		
	});
});
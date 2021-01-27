$(function() {
	$(":submit").click(function() {
		let PostData = 	{
							ragioneSociale: $("input[name='ragioneSociale']").val(),
							email: $("input[name='email']").val(),
							IVA: $("input[name='IVA']").val()
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
				<h2>Richiesta completata</h2>
				<a href="../Home/home.php"><button>OK</button></a>
				`);
			}
		}
		$.post(	"../../ApiAJAX/SellerProfile/sellerRegistrationRequest.php", PostData, PostFunction, "json");		
	});
});
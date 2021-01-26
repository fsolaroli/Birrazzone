$(function() {
	$(":submit[name='forward']").click(function() {
		let PaymentData = {
			nometitolare: $("input[name='Nome']").val(),
			numerocarta: $("input[name='Numero']").val(),
			cvv: $("input[name='CVV']").val(),
			scadenza: $("select[name='mese']").val()+"/"+$("select[name='anno']").val()
		}

		let ManageUpdate = function(errors) {
			if(errors!=null) {
				$(".errors").html("")
				$.each(errors, function (i, val) { 
					$(".errors").append("<p><strong>"+val+"</strong></p>");	 
				});
			} else {
				window.location = "checkOut.php";
			}
		}

		$.post("../../ApiAJAX/ShoppingCart/setCheckOutPaymentCheck.php", PaymentData, ManageUpdate, "json");
	});

	$(":submit[name='undo']").click(function() {
		window.location = "userShoppingCart.php";
	});
});
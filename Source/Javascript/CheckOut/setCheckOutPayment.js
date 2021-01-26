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
				$(".errors > ul").html("")
				$.each(errors, function (i, val) { 
					$(".errors > ul").append("<li><strong>"+val+"</strong></li>");	 
				});
			} else {
				window.location = "checkOut.php";
			}
		}

		$.post("../../ApiAJAX/ShoppingCart/setCheckOutPaymentCheck.php", PaymentData, ManageUpdate, "json");
	});

	$(":submit[name='undo']").click(function() {
		$.post("../../ApiAJAX/ShoppingCart/cancelOrder.php");
		window.location = "userShoppingCart.php";
	});
});
$(function() {
	$(":submit[name='forward']").click(function() {
		let UserData = {
			via: $("input[name='Via']").val(),
			citta: $("input[name='Citta']").val(),
			provincia: $("input[name='Provincia']").val(),
			cap: $("input[name='CAP']").val(),
		}

		let ManageUpdate = function(errors) {
			if(errors!=null) {
				$(".errors").html("")
				$.each(errors, function (i, val) { 
					$(".errors").append("<p><strong>"+val+"</strong></p>");	 
				});
			} else {
				if($("p#get").text() == "checkOut"){
					window.location = "checkOut.php";
				}else{
					window.location = "checkOutPayment.php";
				}
			}
		}
		if($("input[name='checkbox']:checked").val() == "save"){
			$.post("../../ApiAJAX/UserProfile/modifyUserAddressCheck.php", UserData, ManageUpdate, "json");
		}else{
			$.post("../../ApiAJAX/ShoppingCart/sessionCheckOutAddress.php", UserData, ManageUpdate, "json");
		}
	});

	$(":submit[name='undo']").click(function() {
		$.post("../../ApiAJAX/ShoppingCart/cancelOrder.php");
		window.location = "userShoppingCart.php";
	});
});
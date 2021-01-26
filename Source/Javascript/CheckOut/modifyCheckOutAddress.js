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
				window.location = "userAddress.php";
			}
		}
		if($("input[name='checkbox']:checked").val() == "save"){
			$.post("../../ApiAJAX/UserProfile/modifyUserAddressCheck.php", UserData, ManageUpdate, "json");
		}else{
			$.post("../../ApiAJAX/ShoppingCart/sessionCheckOutAddress.php", UserData);
		}
		window.location = "checkOutPayment.php";
	});

	$(":submit[name='undo']").click(function() {
		window.location = "userShoppingCart.php";
	});
});
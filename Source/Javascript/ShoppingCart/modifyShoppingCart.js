$(function(){
	
	$("#delete").click(function(e) {
		$.post("../../ApiAJAX/ShoppingCart/deleteProductFromCart.php", {IdProduct: $(this).attr("alt").split(" ")[1]}, function() {
			location.reload();
		});
	});

	$("button#add").click(function(e) {
		$( "p#qt" ).text(function(i, val){
			$.post("../../ApiAJAX/ShoppingCart/modifyProductQuantity.php", {IdProduct: $(this).attr("alt").split(" ")[1],
																			Quantity: 1});
			return parseInt(val, 10)+ 1;
		  });
	});

	$("button#remove").click(function(e) {
		$( "p#qt" ).text(function(i, val) {
			if(parseInt(val, 10) <= 1){
				$.post("../../ApiAJAX/ShoppingCart/deleteProductFromCart.php", {IdProduct: $(this).attr("alt").split(" ")[1]}, function() {
					location.reload();
				});
			}else{
				$.post("../../ApiAJAX/ShoppingCart/modifyProductQuantity.php", {IdProduct: $(this).attr("alt").split(" ")[1],
																				Quantity: -1}, );
				
				return parseInt(val, 10) - 1;
			}
		  });
	});
});
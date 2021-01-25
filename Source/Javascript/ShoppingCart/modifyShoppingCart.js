$(function(){

	$("#delete").click(function(e) {
		$.post("../../ApiAJAX/ShoppingCart/deleteProductFromCart.php", {IdProduct: $(this).attr("alt").split(" ")[1]}, function() {
			location.reload();
		});
	});

	$("button#add").click(function(e) {
		let IdProduct = $(this).attr("alt").split(" ")[1];
		$("p#qt"+IdProduct).text(function(i, val){
			$.post("../../ApiAJAX/ShoppingCart/modifyProductQuantity.php", {IdProduct,
																			Quantity: 1});
			let newQuantity = parseInt(val, 10) + 1;		
			$.post("../../ApiAJAX/ShoppingCart/updatePrice.php", {IdProduct, newQuantity}, function(newQuantity) {
				$("p#totBeer"+IdProduct).text(newQuantity+"€");
			});
			$.post("../../ApiAJAX/ShoppingCart/updateCartPrice.php", function(newPrice) {
				$("p#totCart").text(newPrice+"€");
			});
			return newQuantity;
		});
	});

	$("button#remove").click(function(e) {
		let IdProduct = $(this).attr("alt").split(" ")[1];
		$("p#qt"+IdProduct).text(function(i, val) {
			if(parseInt(val, 10) <= 1){
				$.post("../../ApiAJAX/ShoppingCart/deleteProductFromCart.php", IdProduct, function() {
					location.reload();
				});
			}else{
				$.post("../../ApiAJAX/ShoppingCart/modifyProductQuantity.php", {IdProduct,
																				Quantity: -1});
				let newQuantity = parseInt(val, 10) - 1;																
				$.post("../../ApiAJAX/ShoppingCart/updatePrice.php", {IdProduct, newQuantity}, function(newQuantity) {
						$("p#totBeer"+IdProduct).text(newQuantity+"€");
				});
				$.post("../../ApiAJAX/ShoppingCart/updateCartPrice.php", function(newPrice) {
					$("p#totCart").text(newPrice+"€");
				});
				return newQuantity;
			}
		});
	});
});
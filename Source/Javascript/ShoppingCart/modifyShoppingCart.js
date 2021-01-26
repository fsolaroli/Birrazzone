$(function(){

	$("#delete").click(function(e) {
		$.post("../../ApiAJAX/ShoppingCart/deleteProductFromCart.php", {IdProduct: $(this).attr("alt").split(" ")[1]}, function() {
			location.reload();
		});
	});

	$("button#add").click(function(e) {
		const IdProduct = $(this).attr("alt").split(" ")[1];
		const max = parseInt($("p#max"+IdProduct).text(), 10);
		$("p#qt"+IdProduct).text(function(i, val){
			let newQuantity = 0;
			if(max > 0){
				newQuantity = parseInt(val, 10) + 1;
				$.post("../../ApiAJAX/ShoppingCart/modifyProductQuantity.php",
					{IdProduct,
					Quantity: 1});
				
				$.post("../../ApiAJAX/ShoppingCart/updatePrice.php", {IdProduct, newQuantity}, function(newPrice) {
					$("p#totBeer"+IdProduct).text((Math.round(newPrice * 100) / 100)+"€");
				});

				$.post("../../ApiAJAX/ShoppingCart/updateCartPrice.php", function(newPrice) {
					$("p#totCart").text((Math.round(newPrice * 100) / 100)+"€");
				});

				$("p#max"+IdProduct).text(function(i, val){
					return parseInt(val, 10) - 1;
				});
			}else{
				newQuantity = parseInt(val, 10);
			}
			return newQuantity;
		});
	});

	$("button#remove").click(function(e) {
		const IdProduct = $(this).attr("alt").split(" ")[1];
		let newQuantity = 0 ;
		$("p#qt"+IdProduct).text(function(i, val) {
			if(parseInt(val, 10) <= 1){
				$.post("../../ApiAJAX/ShoppingCart/deleteProductFromCart.php", IdProduct, function() {
					location.reload();
				});
			}else{
				newQuantity = parseInt(val, 10) - 1;

				$.post("../../ApiAJAX/ShoppingCart/modifyProductQuantity.php", 
					{IdProduct,
					Quantity: -1});
				
				$.post("../../ApiAJAX/ShoppingCart/updatePrice.php", 
					{IdProduct, newQuantity}, function(newPrice) {
					$("p#totBeer"+IdProduct).text((Math.round(newPrice * 100) / 100)+"€");
				});

				$.post("../../ApiAJAX/ShoppingCart/updateCartPrice.php", function(newPrice) {
					$("p#totCart").text((Math.round(newPrice * 100) / 100)+"€");
				});

				$("p#max"+IdProduct).text(function(i, val){
					return parseInt(val, 10)+1;
				});

				return newQuantity;
			}
		});
	});
});
$(function(){

	$("#delete").click(function(e) {
		$.post("../../ApiAJAX/ShoppingCart/deleteProductFromCart.php", {IdProduct: $(this).attr("alt").split(" ")[1]}, function() {
			location.reload();
		});
	});

	$("button#add").click(function(e) {
		let IdProduct = $(this).attr("alt").split(" ")[1];

		$("p#qt"+IdProduct).text(function(i, val){
			//let newQuantity = 0;
			//if(parseInt(val, 10) != max){
				let newQuantity = parseFloat(val) + 1;
				$.post("../../ApiAJAX/ShoppingCart/modifyProductQuantity.php",
					{IdProduct,
					Quantity: 1});
				
				$.post("../../ApiAJAX/ShoppingCart/updatePrice.php", {IdProduct, newQuantity}, function(newPrice) {
					$("p#totBeer"+IdProduct).text((Math.round(newPrice * 100) / 100)+"€");
				});

				$.post("../../ApiAJAX/ShoppingCart/updateCartPrice.php", function(newPrice) {
					$("p#totCart").text((Math.round(newPrice * 100) / 100)+"€");
				});
			//}
			return newQuantity;
		});
	});

	$("button#remove").click(function(e) {
		let IdProduct = $(this).attr("alt").split(" ")[1];
		$("p#qt"+IdProduct).text(function(i, val) {
			if(parseFloat(val) <= 1){
				$.post("../../ApiAJAX/ShoppingCart/deleteProductFromCart.php", IdProduct, function() {
					location.reload();
				});

			}else{
				let newQuantity = parseFloat(val) - 1;

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

				return newQuantity;
			}
		});
	});
});
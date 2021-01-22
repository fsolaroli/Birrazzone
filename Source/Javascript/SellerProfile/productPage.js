function updateBeerQuantity(method) {
	let PostData = {
		productId: $("p#productId").text(),
		quantity: $(":input[type='number']").val(),
		method: method
	}
	$.post("../../ApiAJAX/SellerProfile/updateBeerQuantity.php", PostData,
		function (quantity) {
			$("#disponibilita").text("Disponibilità: " + quantity);	
		},
		"json"
	);
}

$(function() {
	$("main").click(function (e) { 
		$("div.delete").hide();
	});
	$("#deleteProduct").click(function(e) {
		e.stopPropagation();
		$("div.delete").show();
		$("#deleteProductConfermation").click(function() { 
			$.post("../../ApiAJAX/SellerProfile/deleteProduct.php", { productId: $("p#productId").text()}, function() {
				$("main > section").html(`
					<h2>Birra cancellata</h2>
					<a href="sellerProducts.php"><button>OK</button></a>
				`);
			});				
		});
	});
	$(":submit[name='add']").click(function (e) { 
		updateBeerQuantity("add");
	});	
	$(":submit[name='remove']").click(function (e) { 
		updateBeerQuantity("remove");
	});	
});
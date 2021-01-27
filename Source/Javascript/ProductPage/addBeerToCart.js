$(function() {
	$(":submit[name='add']").click(function(e) {
		$.post("../../ApiAJAX/ProductPage/addBeerToCart.php",
			{	
				BeerQt: $("input[name='quantity']").val(),
				IdProduct: $("#productId").text()
			}, function(error){
				if(error != null){
					$(".errors > ul").html("<li><strong>QUANTITA' NON VALIDA</strong></li>");
				} else {
					window.location="../ShoppingCart/userShoppingCart.php"
				}
			}, "json"
		);
	});

	$(":submit[name='toLogin']").click(function (e) {
		e.preventDefault();
		window.location = "../Login/login.php?productId=" + $("#productId").text() + "&quantity=" + $("input[name='quantity']").val();
	});
});
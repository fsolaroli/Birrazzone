$(function(){
	
	$("#delete").click(function(e) {
		$.post("../../ApiAJAX/ShoppingCart/deleteProductFromCart.php", {IdProduct: $(this).attr("alt").split(" ")[1]}, function() {
			location.reload();
		});
	});

	$("button#add").click(function(e) {
		$( "input#qt" ).attr("value", function( i, val ) {
			return parseInt(val, 10)+ 1;
		  });
	});

	$("button#remove").click(function(e) {
		$( "input#qt" ).attr("value", function( i, val ) {
			return parseInt(val, 10)- 1;
		  });
	});

});
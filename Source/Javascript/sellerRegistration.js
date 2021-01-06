$(function() {
	$("main").append(`
	<h1>Registrazione birrificio</h1>
	<form onsubmit="return false;">
		<ul>
			<li><label>Ragione sociale:<input type="text" name="ragioneSociale" required="true"/></label></li>
			<li><label>Email:<input type="email" name="email" required="true"/></label></li>
			<li><label>Partita IVA:<input type="text" name="IVA" required="true"/></label></li>
			<li><input type="submit" value="Invia la richiesta"/></li>
		</ul>
	</form>
	<div class="errori"></div>
	`);

	$(":submit").click(function() {
		let PostData = 	{
							ragioneSociale: $("input[name='ragioneSociale']").val(),
							email: $("input[name='email']").val(),
							IVA: $("input[name='IVA']").val()
						}
		let PostFunction = function (errors) {
			if(errors!=null) {
				$(".errori").html("")
				$.each(errors, function (i, val) { 
					$(".errori").append("<p><strong class='error'>"+val+"</strong></p>");	 
				});
			} else {
				$("main").html(`
				<h1>Registrazione birrificio</h1>
				<h2>Registrazione Completata</h2>
				<form action="home.php">
					<input type="submit" value="OK"/>
				</form>
				`);
			}
		}
		$.post(	"../ApiAJAX/sellerRegistrationRequest.php", PostData, PostFunction, "json");		
	});
});
function setAside() {
	$("aside").html(`
		<ul>
			<li><button id="notification" class="buttonMenu">Notifiche</button><img src="../../../Immagini/Icone/Notification.png" alt="Notification"/></li>
			<li><button id="accountData" class="buttonMenu">Dati Account</button></li>
			<li><button id="sellerData" class="buttonMenu">Dati Birrificio</button></li>
			<li><button id="products" class="buttonMenu">Prodotti</button></li>
		</ul>
	`);
	if ($("header > img[alt='Notification']").html()!=null) {
		$("aside > ul > li:first-of-type > img").show();
	} else {
		$("aside > ul > li:first-of-type > img").hide();
	}
	$("aside").hide();
}

function drawContent(data) {
	switch (data["Type"]) {
		case "Notification":
			$("main > section").html(`
				<h2>Notifiche</h2>
			`);
			if(data["Data"].length == 0) {
				$("main > section").append(`
					<p>Nessuna nuova notifica</p>
				`)
			} else {
				$.each(data["Data"], function (i, notification) { 
					drawNotification(notification);
				});   
			}
			break;
		case "AccountData":
			$("main > section").html(`
				<div class="data">
					<h2>Dati account</h2>
					<p>` 		+ data["Data"]["NomeBirrificio"] 	+ `</p>
					<p>` 		+ data["Data"]["EmailBirrificio"]	+ `</p>
					<p>P.IVA: ` + data["Data"]["PartitaIVA"] 		+ `</p>
					<button id="modifyAccountData" class="modify">Modifica</button>
					<button id="deleteAccount" class="delete">Elimina account</button>
				</div>
				<div class="alert"></div>
			`);
			$("#modifyAccountData").click(function() {
				window.location.href = "modifySellerAccountData.php";			
			});
			$("main").click(function (e) { 
				$("div.alert").html("");	
			});
			$("#deleteAccount").click(function(e) {
				e.stopPropagation();
				$("div.alert").html(`
					<h2>Elimina account</h2>
					<button id="deleteAccountConfermation" class="delete">Conferma eliminazione account</button>
				`);
				$("#deleteAccountConfermation").click(function() { 
					$.post("../ApiAJAX/deleteSellerAccount.php", function() {
						$("main > section").html(`
							<h2>Account cancellato</h2>
							<form action="home.php">
								<input type="submit" value="OK"/>
							</form>
						`);
					});				
				});
			});
			break;
		case "SellerData":
			$("main > section").html(`
				<h2>Dati birrificio</h2>
				<p>` + data["Data"]["Localita"] + `</p>
				<img class="sellerPhoto" src="../../../Immagini/Birrifici/` + data["Data"]["FotoBirrificio"] + `" alt="FotoBirrificio"/>
				<p>` + data["Data"]["DescrizioneBirrificio"] + `</p>
				<button id="modifySellerData" class="modify">Modifica</button>
			`);
			break;
		case "Products":
			$("main > section").html(`
				<h2>Prodotti</h2>
			`);
			$.each(data["Data"], function (i, product) { 
				drawProductOverview(product);
			});
			$("main > section").append(`
				<button class="modify">Aggiungi</button>
			`);
			break;
		default:
			console.log(data);
			break;
	}
}
					
function drawNotification(notification) {
	//TODO
}

function drawProductOverview(product) {
	$("main > section").append(`
			<div class="product">
				<p>` + product["NomeBirra"] + `</p>
				<p><span>Disponibilità:</span><span class="quantity">` + product["Quantita"] + `</span></p>
				<button class="modify">Visualizza</button>
			</div>
	`);
}

$(function () {
	setAside();
	
	$.getJSON("../ApiAJAX/sellerProfileContent.php", drawContent);
	
	$("header > img[alt='Menu']").click(function () { 
		if($("aside").is(":hidden")) {
			$("aside").show('slide'); //TODOMAYBE add animations
		} else {
			$("aside").hide('slide');
		}
	});

	$("#notification").click(function() { 
		$.post("../ApiAJAX/sellerProfileContent.php", { sellerProfilePage: "Notification" }, drawContent, "json");	
	});
	$("#accountData").click(function() { 
		$.post("../ApiAJAX/sellerProfileContent.php", { sellerProfilePage: "AccountData" }, drawContent, "json");	
	});
	$("#sellerData").click(function() { 
		$.post("../ApiAJAX/sellerProfileContent.php", { sellerProfilePage: "SellerData" }, drawContent, "json");	
	});
	$("#products").click(function() { 
		$.post("../ApiAJAX/sellerProfileContent.php", { sellerProfilePage: "Products" }, drawContent, "json");	
	});
});
function generateBrewery(dataBrewery){
	let list = `<section>
					<ul>`;
	for(let i=0; i < dataBrewery.length; i++){
		let brewery= `
		<li>
			${dataBrewery[i]["NomeBirrificio"]} <button> <a href="breweryAdminPage.php?id=${dataBrewery[i]["Idbirrificio"]}">Visualizza</a> </button>
		</li>
		`;
		list += brewery;
	}
	list += 		`</ul>
				</section>`
	return list;
}
$(document).ready(function(){
	$.getJSON("../../ApiAJAX/AdminProfile/api-breweries.php", function(data){
		const brewery = generateBrewery(data);
		$("main").append(brewery);
	});
});

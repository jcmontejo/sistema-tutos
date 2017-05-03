$("#estado").change(event => {
	$.get(`ajax-municipality/${event.target.value}`, function(res, deg){
		$("#municipio").empty();
		res.forEach(element => {
			$("#municipio").append(`<option value=${element.id}> ${element.nombre} </option>`);
		});
	});
});
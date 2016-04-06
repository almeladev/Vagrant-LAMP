$('.enlacecuantas').on("click", function(e) {

	e.preventDefault();
	var enlace = $(this);
	var url = enlace.attr("href");
	enlace.children("span").load(url);

});

$('#formulariorespuesta').on("submit", function(e) {

	e.preventDefault();
	var form = $(this);
	var url = form.attr("action");

	$.post(url, form.serialize(), function(res) {
		$('.mensajef').html(res);
	});

});

$('#formulariorespuestaJSON').on("submit", function(e) {

	e.preventDefault();
	var form = $(this);
	var url = form.attr("action");
	var mensaje = $('.mensajef');
	mensaje.removeClass("exitof");

	$.ajax(url, {
		data: form.serialize(),
		dataType: 'json',
		method: 'post'
	})

	.done(function(res) {
		console.log(res);
		if(res.exito){
		form.toggle();
		mensaje.addClass("exitof");
		$("#cuantasresp").text("Respuestas: " + res.cuantas);
	}

	mensaje.html(res.msg);

	})

	.fail(function(res) {
	     if ( console && console.log ) {
	         console.log( "La solicitud a fallado.");
	     }
	});

});
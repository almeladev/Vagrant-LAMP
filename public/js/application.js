$('.numcomentarios').on("click", function(e) {

	e.preventDefault();
	var enlace = $(this);
	var url = enlace.attr("href");
	enlace.children("span").load(url);

});

$('#formulariocomentario').on("submit", function(e) {

	e.preventDefault();
	var form = $(this);
	var url = form.attr("action");

	$.post(url, form.serialize(), function(res) {
		$('.mensajef').html(res);
	});

	form.toggle();
});

$('#formulariocomentarioJSON').on("submit", function(e) {

	e.preventDefault();
	var form = $(this);
	var url = form.attr("action");
	var mensaje = $('.mensajef');
	mensaje.removeClass("alert alert-success");

	$.ajax(url, {
		data: form.serialize(),
		dataType: 'json',
		method: 'post'
	})

	.done(function(com) {
		console.log(com);
		if(com.exito){
		form.toggle();
		mensaje.addClass("alert alert-success");
		$("#numcomentarios").text("Comentarios: " + com.numComentarios);
	}

	mensaje.html(com.msg);

	})

	.fail(function(com) {
	     if ( console && console.log ) {
	         console.log( "La solicitud a fallado.");
	     }
	});

});
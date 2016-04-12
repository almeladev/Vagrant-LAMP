$('#formulariocomentario').on("submit", function(e) {

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

function confirmacion() {
     if(!confirm("¿Estás seguro/a?")) return false; 
}
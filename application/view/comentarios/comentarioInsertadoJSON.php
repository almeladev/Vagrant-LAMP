<?php
if($comentario){

	$com = array(
		'exito' => true,
		'msg' => 'Comentario insertado correctamente',
		'numComentarios' => $numComentarios
	);

} else {

	$com = array(
		'exito' => false,
		'msg' => $this->fetch('componentes/feedback')
	);

}

echo json_encode($com);

?>
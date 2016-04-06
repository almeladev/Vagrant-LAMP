<?php
if($respuesta){

	$res = array(
		'exito' => true,
		'msg' => 'Respuesta insertada correctamente',
		'cuantas' => $cuantas
	);

} else {

	$res = array(
		'exito' => false,
		'msg' => $this->fetch('partials/feedback')
	);

}

echo json_encode($res);

?>
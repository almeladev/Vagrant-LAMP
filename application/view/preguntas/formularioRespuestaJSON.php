<?php $this->layout('layout') ?>
<div class="container">
<?php if($pregunta): ?>
<article class="pregunta">
	<h3><?= $pregunta->asunto ?></h3>
	<p><?= $pregunta->cuerpo ?></p>
	<p id="cuantasresp">Respuestas: <span id="numrespuestas"><?= $cuantas ?></span></p>
</article>

<div class="mensajef"></div>

<form action="<?= $_SERVER["REQUEST_URI"] ?>" method="post" id="formulariorespuestaJSON">
	<p>
		<label for="respuesta">Respuesta</label>
		<span><textarea name="respuesta"></textarea></span>
	</p>
	<p><input type="submit" value="Enviar"></p>

</form>

<?php else: ?>
<p>Pregunta no encontrada</p>
<?php endif ?>
</div>
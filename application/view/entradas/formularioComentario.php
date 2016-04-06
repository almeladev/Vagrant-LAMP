<?php $this->layout('layout') ?>
<div class="container">
<?php if($entrada): ?>
<article class="entrada">
	<h3><?= $entrada->titulo ?></h3>
	<p><?= $entrada->cuerpo ?></p>
</article>

<div class="mensajef"></div>

<form action="<?= $_SERVER["REQUEST_URI"] ?>" method="post" id="formulariocomentario">
	<p>
		<label for="comentario">Comentario</label>
		<span><textarea name="comentario"></textarea></span>
	</p>
	<p><input type="submit" value="Enviar"></p>

</form>
<?php else: ?>
<p>Entrada no encontrada</p>
<?php endif ?>
</div>
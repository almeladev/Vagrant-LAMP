<?php $this->layout('layout') ?>

<?php if($entrada): ?>
<article class="entrada">
	<h3><?= $entrada->titulo ?></h3>
	<p><?= $entrada->cuerpo ?></p>
	<p id="numcomentarios">Comentarios: <span id="numcomentarios"><?= $numComentarios ?></span></p>
</article>

<div class="mensajef"></div>

<form action="<?= $_SERVER["REQUEST_URI"] ?>" method="post" id="formulariocomentario">
	<div class="form-group">
        <label>Comentario</label>
        <textarea class="form-control textocomentario" name="comentario" placeholder="Exprese aquí su opinión"><?= (isset($datos['cuerpo'])) ? $datos['cuerpo'] : "" ?></textarea>
    </div>
    <input type="submit" class="btn btn-default" value="Enviar">
</form>

<?php else: ?>
<p>entrada no encontrada</p>
<?php endif ?>

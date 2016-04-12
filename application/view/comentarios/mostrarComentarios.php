<h2>Todos los comentarios para la pregunta: </h2>
    <?php if(count($comentarios) == 0): ?>
        <p>No se encuentran comentarios para la pregunta en la Base de Datos</p>
    <?php else: ?>
        <p>Tenemos <?= count($comentarios) ?> comentarios:</p>
        <?php foreach($comentarios as $comentario): ?>
            <article class="respuesta">
        		<p><?= $comentario->cuerpo ?></p>
            </article>
        <?php endforeach ?>
    <?php endif ?>
<h2>Todas las respuestas para la pregunta: </h2>
    <?php if(count($respuestas) == 0): ?>
        <p>No se encuentran respuestas para la pregunta en la Base de Datos</p>
    <?php else: ?>
        <p>Tenemos <?= count($respuestas) ?> encontradas:</p>
        <?php foreach($respuestas as $respuesta): ?>
            <article class="respuesta">
        		<p><?= $respuesta->respuesta ?></p>
            </article>
        <?php endforeach ?>
    <?php endif ?>
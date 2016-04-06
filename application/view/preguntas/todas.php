<?php $this->layout('layout') ?>
<div class="container">
    <?php $this->insert('partials/feedback') ?>
    <h2>Todas las preguntas</h2>
    <?php if(count($preguntas) == 0): ?>
        <p>No se encuentran preguntas en la Base de Datos</p>
    <?php else: ?>
        <p>Tenemos <?= count($preguntas) ?> encontradas:</p>
        <?php foreach($preguntas as $pregunta): ?>
            <article class="pregunta">
                <h3><?= $pregunta->asunto ?></h3>
                <p><?= $pregunta->cuerpo ?></p>
                <footer>
                    <a href="/preguntas/editar/<?= $pregunta->id_pregunta ?>">[ Editar ]</a>
                    <a href="/preguntas/cuantasRespuestas/<?= $pregunta->id_pregunta ?>" class="enlacecuantas">[ Cuantas <span></span>]</a>
                    <a href="/preguntas/enviarRespuesta/<?= $pregunta->id_pregunta ?>">[ Responder (Ajax) ]</a>
                    <a href="/preguntas/enviarRespuestaJSON/<?= $pregunta->id_pregunta ?>">[ Responder (JSON) ]</a>
                    <a href="/preguntas/mostrarRespuestas/<?= $pregunta->id_pregunta ?>">[ Ver Respuestas ]</a>
                </footer>
            </article>
        <?php endforeach ?>
    <?php endif ?>

</div>
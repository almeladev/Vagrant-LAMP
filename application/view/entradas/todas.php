<?php $this->layout('layout') ?>
<div class="container">
    <?php $this->insert('partials/feedback') ?>
    <h2>Todas las entradas (<?= count($entradas) ?>)</h2>
    <?php if(count($entradas) == 0): ?>
        <p>No se encuentran entradas en la Base de Datos</p>
    <?php else: ?>
        <?php foreach($entradas as $entrada): ?>
            <article class="entrada">
                <h3><?= $entrada->titulo ?></h3>
                <p><?= $entrada->cuerpo ?></p>
                <footer>
                    <a href="/entradas/editar/<?= $entrada->id_entrada ?>">[ Editar ]</a>
                    <a href="/entradas/numComentarios/<?= $entrada->id_entrada ?>" class="enlacecuantas">[ Num de comentarios <span></span>]</a>
                    <a href="/entradas/enviarComentario/<?= $entrada->id_entrada ?>">[ Comentar (Ajax) ]</a>
                    <a href="/entradas/enviarComentarioJSON/<?= $entrada->id_entrada ?>">[ Comentar (JSON) ]</a>
                    <a href="/entradas/mostrarComentarios/<?= $entrada->id_entrada ?>">[ Ver comentarios ]</a>
                </footer>
            </article>
        <?php endforeach ?>
    <?php endif ?>

</div>
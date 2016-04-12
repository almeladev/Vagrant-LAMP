<?php $this->layout('layout') ?>

    <?php $this->insert('componentes/feedback') ?>
    <h2>Todas las entradas <span class="badge"><?= count($entradas) ?></span></h2>
    <?php if(count($entradas) == 0): ?>
        <p>No se encuentran entradas en la Base de Datos</p>
    <?php else: ?>
        <?php foreach($entradas as $entrada): ?>
            <article class="page-header">
                <h3><?= $entrada->titulo ?></h3>
                <p><?= $entrada->cuerpo ?></p>
                <footer>
                    <a class="btn btn-default" href="/entradas/editar/<?= $entrada->id_entrada ?>">Editar</a>     
                    <a class="btn btn-default" href="/entradas/borrar/<?= $entrada->id_entrada ?>" onclick="return confirmacion()">Borrar</a>
                    <a class="btn btn-default" href="/comentarios/enviarComentario/<?= $entrada->id_entrada ?>">Comentar</a>
                    <a class="btn btn-default" href="/comentarios/mostrarComentarios/<?= $entrada->id_entrada ?>">Ver comentarios</a>
                </footer>
            </article>
        <?php endforeach ?>
    <?php endif ?>


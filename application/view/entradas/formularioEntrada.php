<?php $this->layout('layout') ?>

    <?php if(isset($accion) && $accion == "editar"): ?>
        <h2>Edita la entrada</h2>
    <?php else: ?>
        <h2>¡Publica una entrada!</h2>
        <p>Un blog vive de las publicaciones. No seas tímido y haz una entrada más ;)</p>
    <?php endif ?>

    <?php $this->insert('partials/feedback') ?>
    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
        <?php if(isset($accion) && $accion == "editar"): ?>
            <input type="hidden" name="id_entrada" value="<?= $datos['id_entrada'] ?>">
        <?php endif ?>
        <div class="form-group">
            <label>Título</label>
            <input type="text" name="titulo" class="form-control" value="<?= (isset($datos['titulo'])) ? $datos['titulo'] : "" ?>" placeholder="¿De qué va la entrada?">
        </div>
        <div class="form-group">
            <label>Cuerpo</label>
            <textarea class="form-control textoentrada" name="cuerpo" placeholder="Escriba aquí lo que quiere publicar."><?= (isset($datos['cuerpo'])) ? $datos['cuerpo'] : "" ?></textarea>
        </div>
        <input type="submit" class="btn btn-default" value="Enviar">
    </form>


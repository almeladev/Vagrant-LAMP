<?php $this->layout('layout') ?>
<div class="container">
    <?php if(isset($accion) && $accion == "editar"): ?>
        <h2>Editar una pregunta</h2>
    <?php else: ?>
        <h2>¿Qué quieres saber?</h2>
        <p>Dinos cuál es tu pregunta. Al preguntar intenta ser claro y plantear tu duda de manera que pueda servir también de utilidad para otras personas</p>
    <?php endif ?>
    <?php $this->insert('partials/feedback') ?>
    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
        <?php if(isset($accion) && $accion == "editar"): ?>
            <input type="hidden" name="id_pregunta" value="<?= $datos['id_pregunta'] ?>">
        <?php endif ?>
        <p>
            <label for="asunto">Asunto</label>
            <span><input type="text" name="asunto" value="<?= (isset($datos['asunto'])) ? $datos['asunto'] : "" ?>"></span>
        </p>
        <p>
            <label for="cuerpo">Cuerpo</label>
            <span><textarea name="cuerpo"><?= (isset($datos['cuerpo'])) ? $datos['cuerpo'] : "" ?></textarea></span>
        </p>
        <p><input type="submit" value="Enviar"></p>
    </form>
</div>

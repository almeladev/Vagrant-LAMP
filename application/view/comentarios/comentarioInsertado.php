<?php if($comentario): ?>
<div class="alert alert-success">Respuesta insertada</div>
<?php else: ?>
<?php $this->insert('componentes/feedback'); ?>
<?php endif ?>
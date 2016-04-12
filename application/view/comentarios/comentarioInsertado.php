<?php if($comentario): ?>
<div class="alert alert-success">Respuesta insertada</div>
<?php else: ?>
<?php $this->insert('partials/feedback'); ?>
<?php endif ?>
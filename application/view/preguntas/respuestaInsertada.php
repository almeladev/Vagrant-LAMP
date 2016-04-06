<?php if($respuesta): ?>
<div class="exitof">Respuesta insertada</div>
<?php else: ?>
<?php $this->insert('partials/feedback'); ?>
<?php endif ?>
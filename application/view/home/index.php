<?php $this->layout('layout') ?>

<div class="container">
    <?= $titulo ?><br>
    Estoy en la Home de esta app

</div>
<?php $this->insert('partials/banner',['dato' => 'Esto va al banner']) ?>

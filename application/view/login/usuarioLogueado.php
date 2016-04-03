<?php $this->layout('layout') ?>
<div class="container">
    <h2>Login Correcto</h2>
    <p>Bienvenido al sistema, <?= Session::get('user_name') ?></p>
</div>

<?php $this->layout('layout') ?>

	<h3><?= $titulo ?> Esta es la página de presentación. <?= $descripcion ?></h3>
    <div class="jumbotron">
  		<h1>Hello!</h1>
  		<p>Bienvenido a Debut!, aprenda MVC de una forma un poco más rápida.</p>
 	    <p><a class="btn btn-primary btn-lg" href="<?php echo URL; ?>Entradas" role="button">Ver entradas</a></p>
</div>

<?php $this->insert('partials/footer') ?>

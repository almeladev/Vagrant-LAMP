<nav class="menu">
	<ul class="nav nav-pills">
		<li class="<?= (strcmp(strtolower($_SERVER['REQUEST_URI']), strtolower("/")) == 0) ? "active" : ""; ?>"><a href="<?php echo URL; ?>">Home</a></li>
		<li class="<?= (strcmp(strtolower($_SERVER['REQUEST_URI']), strtolower("/Entradas")) == 0) ? "active" : ""; ?>"><a href="<?php echo URL; ?>Entradas">Entradas</a></li>
		<li class="<?= (strcmp(strtolower($_SERVER['REQUEST_URI']), strtolower("/Entradas/crear")) == 0) ? "active" : ""; ?>"><a href="<?php echo URL; ?>Entradas/crear">Insertar</a></li>
		<li class="<?= (strcmp(strtolower($_SERVER['REQUEST_URI']), strtolower("/Login")) == 0) ? "active" : ""; ?>"><a href="<?php echo URL; ?>Login">Login</a></li>
		<li class="<?= (strcmp(strtolower($_SERVER['REQUEST_URI']), strtolower("/Privado")) == 0) ? "active" : ""; ?>"><a href="<?php echo URL; ?>Privado">Privado</a></li>
		<li class="<?= (strcmp(strtolower($_SERVER['REQUEST_URI']), strtolower("/Login/salir")) == 0) ? "active" : ""; ?>"><a href="<?php echo URL; ?>Login/salir">Salir</a></li>
	</ul>
</nav>


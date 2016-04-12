<?php $this->layout('layout') ?>
    <h2>Login de Usuarios</h2>
    <?php $this->insert('componentes/feedback') ?>

    <form action="/Login/dologin" method="post">
      <div class="form-group">
        <label>Email:</label>
        <input type="email" name="email" class="form-control" placeholder="Email">
      </div>
      <div class="form-group">
        <label>Contraseña</label>
        <input type="password" name="clave" class="form-control" placeholder="Contraseña">
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" value="1" name="recordarme"> Recordarme
        </label>
      </div>
      <input type="submit" class="btn btn-default" value="Acceder"></input>
    </form>


<h1>Vagrant LAMP</h1>

<p>Mi entorno de desarrollo LAMP (Linux, Apache, MySQL, PHP) para Vagrant.</p> 

<h2>Requerimientos</h2>
<ul>
  <li><a href="https://www.virtualbox.org">Virtualbox</a></li>
  <li><a href="https://www.vagrantup.com">Vagrant</a></li>
</ul>

<h2>Instalación</h2>
<ol>
  <li>Descargar los archivos del directorio "_install" a la carpeta de trabajo.</li>
  <li>Nos situamos con el intérprete de comandos en la carpeta.</li>
  <li>Escribimos  <code>vagrant up</code></li>
</ol>
<p>Y no hay más!</p>

<h2>Características</h2>
<p><b> Incluye las actualizaciones más recientes! </b></p>
<ul>
  <li>Box Ubuntu 14.04 trusty 64</li>
  <li>Apache 2.4</li>
  <li>PHP 7</li>
  <li>MySQL 5.7</li>
</ul>

<h2>Configuración y uso</h2>
<p>La IP es <code>192.168.56.101</code> y el directorio de trabajo es <code>www</code></p>
<ul>
  <li>Usuario de MySQL: <code>root</code></li>
  <li>Contraseña de MySQL: <code>123</code></li>
</ul>
<p>La configuración es susceptible de cambio en los ficheros "vagrantfile" y "config.sh". Enjoy!</p>

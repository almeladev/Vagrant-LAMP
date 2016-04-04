#!/usr/bin/env bash

# ======================================================= #
# config.sh
#
# Archivo de configuración automática para la box 
# Ubuntu 14.04
#
# Autor: Daniel Martínez
# Author URI: http://danmnez.me
# Version: 0.7
# Licencia: http://unlicense.org/
# ======================================================= #

# ======================================================= #
# Variables y funciones globales
# ======================================================= #

DATABASE_SQL='database.sql' 				              # Base de datos.
PASSWORD='123' 								       		  # Contraseña de la base de datos.
PROJECTFOLDER='proyecto' 					  	   		  # Nombre del directorio del proyecto.
GIT_REPOS='https://github.com/DanMnez/Vagrant-LAMP-PHP7'  # Repositorios del proyecto en GitHub.

update() {
	sudo apt-get update
}

# ======================================================= #
# Actualizamos el sistema e instalamos utilidades
# ======================================================= #
update
sudo apt-get upgrade -y
sudo apt-get install zip unzip -y

# ======================================================= #
# Instalación de apache2
# ======================================================= #
sudo apt-get install apache2 -y

# ======================================================= #
# Instalación de php 7 
# ======================================================= #
sudo apt-get install python-software-properties -y
sudo add-apt-repository ppa:ondrej/php
update

sudo apt-get install php7.0-cli php7.0 libapache2-mod-php7.0 php7.0-mysql -y
sudo apt-get install php7.0-cgi php7.0-dbg php7.0-dev php7.0-curl php7.0-gd -y
sudo apt-get install php7.0-mcrypt php7.0-xsl php7.0-intl -y

# ======================================================= #
# Instalación de mysql 5.7 
# ======================================================= #
export DEBIAN_FRONTEND=noninteractive # Forzamos al sistema a no tener interacción manual.
apt-key adv --keyserver ha.pool.sks-keyservers.net --recv-keys 5072E1F5 
echo "deb http://repo.mysql.com/apt/ubuntu/ trusty mysql-5.7" | tee -a /etc/apt/sources.list.d/mysql.list
update

debconf-set-selections <<< "mysql-community-server mysql-community-server/data-dir select ''"
debconf-set-selections <<< "mysql-community-server mysql-community-server/root-pass password $PASSWORD"
debconf-set-selections <<< "mysql-community-server mysql-community-server/re-root-pass password $PASSWORD"
sudo apt-get install mysql-server -y

# ======================================================= #
# Creación del directorio del proyecto 
# ======================================================= #
sudo mkdir "/var/www/html/${PROJECTFOLDER}"

# ======================================================= #
# Creación del virtualhost
# ======================================================= #
VHOST=$(cat <<EOF
<VirtualHost *:80>
    DocumentRoot "/var/www/html/${PROJECTFOLDER}/public"
    <Directory "/var/www/html/${PROJECTFOLDER}/public">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
EOF
)
echo "${VHOST}" > /etc/apache2/sites-available/000-default.conf

# ======================================================= #
# Habilita el módulo reescritura para urls amigables
# Reinicia apache
# ======================================================= #
sudo a2enmod rewrite
service apache2 restart

# ======================================================= #
# Elimina el index.html por defecto de apache
# ======================================================= #
sudo rm "/var/www/html/index.html"

# ======================================================= #
# Instala Git
# ======================================================= #
sudo apt-get install -y git

# ======================================================= #
# Clona el repositorio de GitHub
# ======================================================= #
sudo git clone "${GIT_REPOS}" "/var/www/html/${PROJECTFOLDER}"

# ======================================================= #
# Descarga el administrador de MySQL Adminer
# ======================================================= #
sudo mkdir "/var/www/html/${PROJECTFOLDER}/public/adminer"
sudo wget "http://www.adminer.org/latest.php" -O "/var/www/html/${PROJECTFOLDER}/public/adminer/index.php" 

# ======================================================= #
# Instalación de Composer
# ======================================================= #
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

# ======================================================= #
# Instalación de los paquetes incluidos en composer
# ======================================================= #
cd "/var/www/html/${PROJECTFOLDER}"
composer install

# ======================================================= #
# Carga la base de datos
# ======================================================= #
sudo mysql -h "localhost" -u "root" "-p${PASSWORD}" < "/var/www/html/${PROJECTFOLDER}/_install/${DATABASE_SQL}"

# ======================================================= #
# Copia la contraseña de la base de datos en el archivo 
# de configuración -> define('DB_PASS', 'your_password');
# ======================================================= #
sudo sed -i "s/your_password/${PASSWORD}/" "/var/www/html/${PROJECTFOLDER}/application/config/config.php"

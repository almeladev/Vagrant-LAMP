#!/usr/bin/env bash
# ======================================================= #
# config.sh - Configuración para Vagrant LAMP
#
# Archivo de configuración automática para la box 
# Ubuntu 14.04 en Vagrant.
#
# Autor: Daniel Martínez <danmnez.me>
# Version: 0.7
# Licencia: http://unlicense.org/
# Creado: 12.04.2016
# ======================================================= #

# ======================================================= #
# Variables y funciones globales
# ======================================================= #

PROJECTFOLDER='www' # Nombre del directorio para los proyectos.

update() {
	sudo apt-get update
}

# ======================================================= #
# Actualizamos el sistema e instalamos utilidades
# ======================================================= #
update
sudo apt-get upgrade -y

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
# Creación del directorio para los proyectos
# ======================================================= #
sudo mkdir "/var/www/html/${PROJECTFOLDER}"

# ======================================================= #
# Creación del virtualhost
# ======================================================= #
VHOST=$(cat <<EOF
<VirtualHost *:80>
    DocumentRoot "/var/www/html/${PROJECTFOLDER}"
    <Directory "/var/www/html/${PROJECTFOLDER}">
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
# mueve el index.html por defecto de apache
# ======================================================= #
sudo mv "/var/www/html/index.html" "/var/www/html/${PROJECTFOLDER}"

# ======================================================= #
# Mensaje de fin
# ======================================================= #
echo -e "\nVagrant LAMP ha sido instalado. Enjoy!"
# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

  # Versión de la box utilizada
  config.vm.box = "ubuntu/trusty64"

  # Creación de una red privada, la máquina responderá a la IP especificada.
  config.vm.network "private_network", ip: "192.168.33.44"

  # Share an additional folder to the guest VM. The first argument is the path on the host to the actual folder.
  # The second argument is the path on the guest to mount the folder.
  # Crea una carpeta compartida, la máquina montará la ruta (./) en el directorio especificado
  config.vm.synced_folder "./", "/var/www/html"

  # Define the bootstrap file: A (shell) script that runs after first setup of your box (= provisioning)
  # Shell que configurará la máquina una vez creada
  config.vm.provision :shell, path: "bootstrap.sh"

end

# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  ##config.vm.box = "markush81/centos7-vbox-guestadditions"
  config.vm.box = "hashicorp/precise64"
  config.vm.box_version = "1.0.2"

  config.vm.provider "virtualbox" do |v|
    v.name="pizzatest." + Time.now.strftime("%Y%m%d-%H%M")
    v.memory = "1024"
  end

  #config.vm.network "forwarded_port", guest: 80, host: 8080
  config.vm.network "private_network", ip: "192.168.16.21"
  config.vm.hostname = "pizzatest.vendo.local"

  config.vm.provision "shell" do |s| 
    s.inline = <<-SHELL
      source /vagrant/provisioning/install.sh
    SHELL
  end
end

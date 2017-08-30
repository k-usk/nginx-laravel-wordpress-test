# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|
  config.vm.box = "centos6.5"
  config.vm.network "private_network", ip: "192.168.33.18"
  config.vm.hostname = "laravel-wp-test.local"
  config.vm.synced_folder "./", "/vagrant/", mount_options: ['dmode=777', 'fmode=777']
end

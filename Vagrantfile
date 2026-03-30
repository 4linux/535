# frozen_string_literal: true

# -*- mode: ruby -*-
# vi: set ft=ruby :

require 'yaml'

VAGRANT_DISABLE_VBOXSYMLINKCREATE = 1

def vms_config
  # Lê as configurações das VMs Linux do arquivo externo
  cfg = YAML.load_file(File.join(File.dirname(__FILE__), 'vms-config.yaml'), aliases: true)
  cfg.values_at('playbooks_dir', 'hosts')
end

PLAYBOOK_DIR, VMS_CONFIG = vms_config

# Configura Virtualbox Guest Addditions no Ubuntu/Debian
# Não deve ser necessário fazer isso pois os boxes do usuário Bento já vem com ele instalado
# apt-get install --no-install-recommends build-essential dkms linux-headers-$(uname -r)
# apt-get purge build-essential dkms linux-headers-$(uname -r)
# apt-get autoremove -y
install_apt_packages = <<~CMDS
  export DEBIAN_FRONTEND=noninteractive
  sudo apt-get purge snapd cryptsetup -y
  sudo apt-get update
  sudo apt-get upgrade -y
  sudo apt-get install python3-venv -y
  sudo apt-get autoremove -y
  sudo apt-get clean
CMDS

# Configura o Virtualbox Guest Additions no Rocky Linux
# https://wiki.rockylinux.org/rocky/repo/#community-approved-repositories
# sudo dnf install -y "kernel-devel-$(uname -r)" "kernel-headers-$(uname -r)" gcc make elfutils-libelf-devel bzip2 perl tar
# sudo dnf remove -y "kernel-devel-$(uname -r)" "kernel-headers-$(uname -r)" gcc make elfutils-libelf-devel bzip2 perl tar
install_ansible_rpm = <<~CMDS
  sudo dnf remove -y podman buildah
  sudo dnf makecache
  sudo dnf upgrade -y
  sudo dnf install epel-release -y
  sudo dnf makecache
  sudo dnf install ansible-core -y
  sudo dnf autoremove -y
  sudo dnf clean all
CMDS

Vagrant.configure('2') do |config|
  config.vm.box_check_update = false

  VMS_CONFIG.each do |name, conf|
    config.vm.define name do |k|
      k.vm.box = conf['box']
      k.vm.hostname = name
      k.vm.network 'private_network', ip: "172.16.0.#{conf['ip']}"

      k.vm.provider 'virtualbox' do |vb|
        vb.name = name
        vb.linked_clone = true
        vb.memory = conf['memory']
        vb.cpus = conf['cpus']
        vb.customize ['modifyvm', :id, '--vram', '16']
        vb.customize ['modifyvm', :id, '--graphicscontroller', 'vmsvga']
        vb.customize ['storageattach', :id, '--storagectl', 'SATA Controller', '--port', '1', '--device', '0',
                      '--type', 'dvddrive', '--medium', 'emptydrive']
      end

      k.vm.provision 'shell', inline: install_ansible_rpm if conf['box'] =~ /rocky/

      if conf['box'] =~ /ubuntu/
        config.vm.synced_folder '.', '/vagrant', mount_options: ['_netdev']
        k.vm.provision 'shell', inline: install_apt_packages
      end

      if name != 'winclient' # já tem seu próprio bloco de configuração
        k.vm.provision 'ansible_local' do |ansible|
          ansible.playbook = File.join(PLAYBOOK_DIR, conf['provision'])
        end
      end

      k.vm.provision 'shell', path: 'vm-public-key.sh'
    end
  end
  config.vm.define 'winclient', autostart: false do |mswin|
    mswin.vm.box = 'gusztavvargadr/windows-11'
    mswin.vm.network 'private_network', ip: '172.16.0.204'
    mswin.vm.box_version = '1.0'
    mswin.vm.guest = :windows
    mswin.vm.provider 'virtualbox' do |vb|
      vb.memory = '3072'
    end
    mswin.vm.communicator = :winrm
    mswin.winrm.username = 'vagrant'
    mswin.winrm.password = 'vagrant'
  end
end

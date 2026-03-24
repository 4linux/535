# frozen_string_literal: true

# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANT_DISABLE_VBOXSYMLINKCREATE = 1
ROCKY_LINUX = 'bento/rockylinux-9.6'
UBUNTU = 'bento/ubuntu-24.04'
PLAYBOOKS_DIR = '/vagrant/provision/ansible'

vms = {
  'ansible' => { 'memory' => '3584', 'cpus' => 2, 'ip' => '199', 'box' => UBUNTU,
                 'provision' => "#{PLAYBOOKS_DIR}/ansible.yaml" },
  'balancer' => { 'memory' => '700', 'cpus' => 1, 'ip' => '200', 'box' => ROCKY_LINUX,
                  'provision' => "#{PLAYBOOKS_DIR}/balancer.yaml" },
  'webserver1' => { 'memory' => '700', 'cpus' => 1, 'ip' => '201', 'box' => UBUNTU,
                    'provision' => "#{PLAYBOOKS_DIR}/webserver1.yaml" },
  'webserver2' => { 'memory' => '700', 'cpus' => 1, 'ip' => '202', 'box' => ROCKY_LINUX,
                    'provision' => "#{PLAYBOOKS_DIR}/webserver2.yaml" },
  'dbserver' => { 'memory' => '600', 'cpus' => 1, 'ip' => '203', 'box' => 'bento/debian-13',
                  'provision' => "#{PLAYBOOKS_DIR}/dbserver.yaml" }
}

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
  vms.each do |name, conf|
    config.vm.define name do |k|
      k.vm.box = conf['box']
      k.vm.hostname = name
      k.vm.network 'private_network', ip: "172.16.0.#{conf['ip']}"
      k.vm.provider 'virtualbox' do |vb|
        vb.memory = conf['memory']
        vb.cpus = conf['cpus']
        vb.name = name
        vb.customize ['modifyvm', :id, '--vram', '16']
        vb.customize ['modifyvm', :id, '--graphicscontroller', 'vmsvga']
        vb.customize ['storageattach', :id, '--storagectl', 'SATA Controller', '--port', '1', '--device', '0',
                      '--type', 'dvddrive', '--medium', 'emptydrive']
      end

      k.vm.provision 'shell', inline: install_ansible_rpm if conf['box'] == ROCKY_LINUX

      if conf['box'] == UBUNTU
        config.vm.synced_folder '.', '/vagrant', mount_options: ['_netdev']
        k.vm.provision 'shell', inline: install_apt_packages
      end

      k.vm.provision 'ansible_local' do |ansible|
        ansible.playbook = conf['provision']
      end

      k.vm.provision 'shell', path: 'vm-public-key.sh'
    end
  end
  config.vm.define 'winclient' do |win10|
    win10.vm.box = 'gusztavvargadr/windows-11'
    win10.vm.network 'private_network', ip: '172.16.0.204'
    win10.vm.box_version = '1.0'
    win10.vm.guest = :windows
    win10.vm.provider 'virtualbox' do |vb|
      vb.memory = '3072'
    end
    win10.vm.communicator = :winrm
    win10.winrm.username = 'vagrant'
    win10.winrm.password = 'vagrant'
  end
end

# frozen_string_literal: true

# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANT_DISABLE_VBOXSYMLINKCREATE = 1
ROCKY_LINUX = 'bento/rockylinux-9.6'
UBUNTU = 'devopsbox/ubuntu-20.04'

vms = {
  'ansible' => { 'memory' => '3584', 'cpus' => 2, 'ip' => '199', 'box' => UBUNTU,
                 'provision' => 'provision/ansible/ansible.yaml' },
  'balancer' => { 'memory' => '700', 'cpus' => 1, 'ip' => '200', 'box' => ROCKY_LINUX,
                  'provision' => 'provision/ansible/balancer.yaml' },
  'webserver1' => { 'memory' => '700', 'cpus' => 1, 'ip' => '201', 'box' => UBUNTU,
                    'provision' => 'provision/ansible/webserver1.yaml' },
  'webserver2' => { 'memory' => '700', 'cpus' => 1, 'ip' => '202', 'box' => ROCKY_LINUX,
                    'provision' => 'provision/ansible/webserver2.yaml' },
  'dbserver' => { 'memory' => '600', 'cpus' => 1, 'ip' => '203', 'box' => 'bento/debian-13',
                  'provision' => 'provision/ansible/dbserver.yaml' }
}

install_ansible_apt = <<~CMDS
  export DEBIAN_FRONTEND=noninteractive
  sudo apt-get update
  sudo apt-get upgrade -y
  sudo apt-get install python3.10-venv -y
  sudo apt-get autoremove -y
  sudo apt-get clean

  if [[ ! -d /home/vagrant/.venv ]]
  then
    python3 -m venv /home/vagrant/.venv
    source /home/vagrant/.venv/bin/activate && python -m pip install ansible
  fi

  if [[ ! -f /etc/ansible/ansible.cfg ]]
  then
      sudo ansible-config init --disabled > /etc/ansible/ansible.cfg
  fi
CMDS

# https://wiki.rockylinux.org/rocky/repo/#community-approved-repositories
# Configure Virtualbox Guest Additions
# Upgrading the system might also change the kernel version, so installing those only after an upgrade and reboot
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
      end
      k.vm.provision 'ansible_local' do |ansible|
        ansible.playbook = "#{conf['provision']}"
        ansible.compatibility_mode = '2.0'
      end
    end
  end
  config.vm.define 'winclient' do |win10|
    win10.vm.box = 'devopsbox/windows-10'
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

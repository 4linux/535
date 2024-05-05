# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANT_DISABLE_VBOXSYMLINKCREATE=1

vms = {
  'ansible' => {'memory' => '3584', 'cpus' => 2, 'ip' => '199', 'box' => 'devopsbox/ubuntu-20.04', 'provision' => 'provision/ansible/ansible.yaml'},
  'balancer' => {'memory' => '700', 'cpus' => 1, 'ip' => '200', 'box' => 'devopsbox/centos-8.5', 'provision' => 'provision/ansible/balancer.yaml'},
  'webserver1' => {'memory' => '700', 'cpus' => 1, 'ip' => '201', 'box' => 'devopsbox/ubuntu-20.04', 'provision' => 'provision/ansible/webserver1.yaml'},
  'webserver2' => {'memory' => '700', 'cpus' => 1, 'ip' => '202', 'box' => 'devopsbox/centos-8.5', 'provision' => 'provision/ansible/webserver2.yaml'},
  'dbserver' => {'memory' => '600', 'cpus' => 1, 'ip' => '203', 'box' => 'devopsbox/debian-10.11', 'provision' => 'provision/ansible/dbserver.yaml'}
}

Vagrant.configure('2') do |config|

  config.vm.box_check_update = false
  vms.each do |name, conf|
    config.vm.define "#{name}" do |k|
      k.vm.box = "#{conf['box']}"
      k.vm.hostname = "#{name}"
      k.vm.network 'private_network', ip: "172.16.0.#{conf['ip']}"
      k.vm.provider 'virtualbox' do |vb|
        vb.memory = conf['memory']
        vb.cpus = conf['cpus']
      end
      k.vm.provision 'ansible_local' do |ansible|
        ansible.playbook = "#{conf['provision']}"
        ansible.compatibility_mode = '2.0'
      end
    end
  end
    config.vm.define "winclient" do |win10|
      win10.vm.box = "devopsbox/windows-10"
      win10.vm.network 'private_network', ip: "172.16.0.204"
      win10.vm.box_version = "1.0"
      win10.vm.guest = :windows
      win10.vm.provider 'virtualbox' do |vb|
        vb.memory = "2048"
    end
      win10.vm.communicator = :winrm
        win10.winrm.username = "vagrant"
        win10.winrm.password = "vagrant"
  end
end

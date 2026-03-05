# Laboratório 535 - Gerenciar Ambientes Automatizados com Ansible

Repositório para armazenar o Laboratório do curso de Ansible da [4Linux][1].

## Dependências

Para a criação do laboratório é necessário ter pré instalado os seguintes *softwares*:

* [Git][2]
* [VirtualBox][3]
* [Vagrant][4]

> Para as máquinas com MacOSX aconselhamos, se possível, que as instalações sejam feitas pelo gerenciador de pacotes `brew`.

## Laboratório

O Laboratório será criado utilizando o [Vagrant][6]. Ferramenta para criar e gerenciar ambientes virtualizados (baseado em Inúmeros providers) com foco em automação.

Nesse laboratório, que está centralizado no arquivo [`Vagrantfile`][7], sera criada uma máquina com as seguintes característica:

Nome       | vCPUs | Memoria RAM | IP            | S.O.¹
---------- |:-----:|:-----------:|:-------------:|:---------------:
ansible     | 2     | 3584MB | 172.16.0.199 | ubuntu-20.04
balancer     | 1     | 700MB | 172.16.0.200 | rocky-linux-9.6
web-server1     | 1     | 700MB | 172.16.0.201 | ubuntu-20.04
web-server2     | 1     | 700MB | 172.16.0.202 | rocky-linux-9.6
dbserver     | 1     | 600MB | 172.16.0.203 | debian-10.11
winclient     | 2     | 2048MB | 172.16.0.204 | windows-10


> **¹**: Esses Sistemas operacionais estão sendo utilizado no formato de Boxes, é a forma como o Vagrant chama as imagens do sistema operacional utilizado.

## Criação do Laboratório

Para criar o laboratório é necessário fazer o `git clone` desse repositório e, dentro da pasta baixada realizar a execução do `vagrant up`, conforme abaixo:

SOMENTE VMS LINUX
```bash
git clone https://github.com/4linux/535
cd 535/
vagrant up ansible balancer webserver1 webserver2 dbserver
```

SOMENTE VM WINDOWS
```bash
vagrant plugin install winrm
vagrant plugin install winrm-elevate

git clone https://github.com/4linux/535
cd 535/
vagrant up winclient
```

_O Laboratório **pode demorar**, dependendo da conexão de internet e poder computacional, para ficar totalmente preparado._

> Em caso de erro na criação das máquinas sempre valide se sua conexão está boa, os erros impressos na tela e, se necessário, o arquivo **/var/log/vagrant_provision.log** dentro da máquina que apresentou a falha.

Por fim, para melhor utilização, abaixo há alguns comandos básicos do Vagrant para gerencia das máquinas virtuais.

Comandos                | Descrição
------------------------| ---------------------------------------
`vagrant init`          | Gera o Vagrantfile
`vagrant box add <box>` | Baixar imagem do sistema
`vagrant box status`    | Verificar o status dos boxes criados
`vagrant up`            | Cria/Liga as VMs baseado no Vagrantfile
`vagrant provision`     | Provisiona mudanças logicas nas VMs
`vagrant status`        | Verifica se VM estão ativas ou não.
`vagrant ssh <vm>`      | Acessa a VM
`vagrant ssh <vm> -c <comando>` | Executa comando via ssh
`vagrant reload <vm>`   | Reinicia a VM
`vagrant halt`          | Desliga as VMs

> Para maiores informações acesse a [Documentação do Vagrant][8].

### Tabela Comparativa de Boxes Windows no Vagrant

O *box* original utilizado para a VM Windows apresenta uma série de problemas e a sugestão é trocar essa *box* por outra.

| Recurso | `devopsbox` | `gusztavvargadr` | `mwrock` |
| :--- | :--- | :--- | :--- |
| **Confiabilidade** | **Baixa/Variável.** Frequentemente carece de pré-configuração do WinRM. | **Alta.** Construída especificamente para automação de CI/CD e DevOps. | **Muito Alta.** Mantida pelo criador da biblioteca WinRM usada pelo Vagrant. |
| **Configuração WinRM** | Básica ou incompleta. | Robusta; inclui "autologon" e listeners pré-configurados. | Configurada com perfeição para o transporte `plaintext` do Vagrant. |
| **Atualizações** | Infrequentes. | Mensais (altamente automatizadas). | Frequentes. |
| **Tamanho** | Variável; muitas vezes inchada com aplicativos desnecessários. | Otimizada; oferece versões "Core" (sem interface) e "Desktop". | Altamente otimizada para velocidade de carregamento. |

## Referências

[1]: https://4linux.com.br
[2]: https://git-scm.com/downloads
[3]: https://www.virtualbox.org/wiki/Downloads
[4]: https://www.vagrantup.com/downloads
[5]: https://cygwin.com/install.html
[6]: https://www.vagrantup.com/
[7]: ./Vagrantfile
[8]: https://www.vagrantup.com/docs

- [4Linux][1]
- [Git][2]
- [Virtualbox][3]
- [Cygwin][5]
- [Vagrant][6]

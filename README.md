# Laboratório 535 - Gerenciar Ambientes Automatizados com Ansible

Repositório para armazenar o Laboratório do curso de Ansible da [4Linux][1].

Eu fiz um *fork* deste repositório para poder revisar o conteúdo com os seguintes objetivos:

1. Manter a configuração DRY: algumas decisões tomadas foram feitas com objetivos didáticos, mas existe repetições de configuração.
1. Evitar o uso do Sudo para operações, já que é completamente desnecessário.
1. Utilizar boas práticas de configurações de SSH, como incluir as chaves das VMs para sempre confirmar a identidade das VMs, assim como evitar o *login* com o usuário root.
1. Atualizar/substituir os *boxes* das distribuições Linux, visto que algumas delas foram descontinuadas.
1. Utilizar uma versão mais recente do Ansible, independente da versão disponível como pacote para a distribuição Linux.
1. Utilizar o recurso de *linked clone* do Virtualbox para reduzir o espaço em disco total utilizado pelas VMs.

No caso da distribuição CentOS, houveram substituições pelo Rocky Linux, que por sua vez pode apresentar **problemas**
com a versão do Virtualbox disponível (eu utilizei a versão 7.1.16 r172425 (Qt6.4.2)). Caso você identifique falhas na
inicialização, tente usar uma versão mais recente do Virtualbox e/ou Rocky Linux.

A configuração de alguns aspectos de segurança (como o caso do OpenSSH) visa tentar reproduzir o que seria necessário
fazer em um ambiente produtivo, apesar deste ser um laborátorio.

Você pode verificar as alterações que fiz usando o `git log` (ou equivalente) para ler o motivo dessas modificações.

## Ajustes pendentes

- recriar toda a configuração do Molecule para trabalhar com imagens Docker via Podman.

## Dependências

Para a criação do laboratório é necessário ter pré instalado os seguintes *softwares*:

* [Git][2]
* [VirtualBox][3]
* [Vagrant][4]

> Para as máquinas com MacOSX aconselhamos, se possível, que as instalações sejam feitas pelo gerenciador de pacotes `brew`.

## Laboratório

O Laboratório será criado utilizando o [Vagrant][6].

Nesse laboratório, que está centralizado no arquivo [`Vagrantfile`][7], serão criadas máquina virtuais com as seguintes característica:

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

### Virtualbox Guest Additions

Instalar o Guest Additions nas VMs Linux é **requerido** para providenciar o compartilhamento de arquivos entre as VMs.
Também melhora bastante a experiência em utilizar as VMs com o Virtualbox.

> Usar um *box* que já tenha o Guest Additions instalado é sempre uma boa ideia para evitar este trabalho todo

Existe muita documentação disponível sobre o tema na internet, então vou limitar os comentários aqui para indicar como
utilizar essa funcionalidade com as VMs do treinamento.

Primeiro, instalar o Guest Additions vai exigir a instalação de ferramentas de compilação de código C e também os
arquivos *headers* da versão do kernel presente, inserir o CDROM respectivo e rodar a instalação, o que irá compilar
um módulo específico para a versão do kernel presente.

Controlar isto via Vagrant é complexo, principalmente se você não quer manter essas ferramentas de desenvolvimento
instaladas, se espaço em disco for um problema. O *plug-in* vbguest tenta ajudar neste sentido, mas não consegue ir
muito longe sem alguma intervenção manual.

Disto isto, não consegui (pelo menos ainda) implementar idempotência com o Vagrant para esta tarefa e ainda manter a
VM pequena. Reduzir o espaço em disco depois de instalar o Guest Additions não é uma tarefa trivial ou rápida. Você
também vai querer "pregar" (*pin*) a versão do kernel na VM, ou vai ter que ficar compilando o módulo a cada nova
versão.

Disto isto, revise o `Vagrantfile` neste repositório para habilitar/desabilitar os comandos respectivos para instalar
os pacotes necessários (específicos por distribuição Linux) e rodar o procedimento manual.

Garanta que todas as atualizações de kernel foram feitas **antes** de iniciar a instalação do módulo do Guest
Additions, caso contrário você irá perder seu tempo repetindo a instalação do mesmo.

### Configuração de SSH

Parte das automações relacionadas garantem que os servidores se comuniquem entre si usando chaves assimétricas, tanto
para autenticação quanto para aferir os servidores.

Crie uma chave SSH e copie-a para todos os servidores com o comando ssh-copy:

```bash
for i in {199..203}
do
    ssh-copy-id -i ~/.ssh/vagrant.pub "suporte@172.16.0.$i"
done
```

Você terá que digitar a senha `4linux` para copiar a chave. Essa será a única vez que precisará fazer isso.

Depois inicie o `ssh-agent` e adicione a chave privada nele com o `ssh-add`, para que você não tenha que ficar
informando ela a cada nova execução.

Para que você use o cliente `ssh` para se conectar automaticamente nas VMs fazendo mesmo, utilize o arquivo
ssh-setup.sh **antes** de iniciar a conexão, da seguinte forma:

```
. ssh-setup.sh
```

Isso configurará as CLI's do OpenSSH para trabalhar da mesma forma como os servidores funcionam.

Como último passo, você deverá copiar a chave SSH privada para a VM ansible, já que ela irá precisar se autenticar nas
demais VMs para executar as ações do Ansible. No exemplo abaixo, estou copiando a mesma chave privada que o Vagrant
gerou automaticamente:

```
scp ~/.ssh/vagrant suporte@172.16.0.199:/home/suporte/.ssh/vagrant
```

### Como configurar o Docker para executar o systemd

São necessários uma série de ajustes (**perigosos** em termos de segurança) na configuração de um container para que o
systemd funcione conforme o esperado.

Esse tipo de configuração se torna necessária se você quiser simular um *daemon* gerenciado pelo systemd em um
container e usar o mesmo para testes automatizados com o Molecule.

- https://developers.redhat.com/blog/2014/05/05/running-systemd-within-docker-container
- https://developers.redhat.com/blog/2019/04/24/how-to-run-systemd-in-a-container

## Como configurar o Ansible na VM ansible

Todas as VMs já terão o Ansible instalado globalmente.

Você poderia utilizar esse Ansible, mas invariavelmente a versão dele será mais antiga que a última versão disponível
para download.

Além disso, o que é instalado nas VMs é o Ansible Core, que não vem com diversas [ferramentas muito úteis][9] para o
desenvolvimento de playbooks e roles.

Faça o login com o usuário `suporte`, e usando o método abaixo, você instala uma versão privada do Ansible somente para
este usuário, sem correr nenhum risco de interferir com a versão global. Repare que o `sudo` não é usado pois as
permissões necessárias você já tem.

```
python3 -m venv $HOME/.venv
. $HOME/.venv/bin/activate
python3 -m pip install -U pip
python3 -m pip install ansible-dev-tools
```

Toda a vez que você quiser usar o Ansible, ative o virtual environment do Python primeiro.

## Referências

[1]: https://4linux.com.br
[2]: https://git-scm.com/downloads
[3]: https://www.virtualbox.org/wiki/Downloads
[4]: https://www.vagrantup.com/downloads
[5]: https://cygwin.com/install.html
[6]: https://www.vagrantup.com/
[7]: ./Vagrantfile
[8]: https://www.vagrantup.com/docs
[9]: https://docs.ansible.com/projects/dev-tools/
[10]: https://linux-system-roles.github.io/

- [4Linux][1]
- [Git][2]
- [Virtualbox][3]
- [Cygwin][5]
- [Vagrant][6]
- [ansible-dev-tools][9]
- [Linux System Roles][10]

#!/bin/bash

set -eo pipefail

VAGRANT_SHARE=/vagrant
HOSTS_KEYS=$VAGRANT_SHARE/known-vms.txt
HOST_PUB_KEY=/etc/ssh/ssh_host_ed25519_key.pub

if [[ -d $VAGRANT_SHARE ]]
then
    # vide o Vagrantfile para ver as configurações de endereço IP das VMs
    VM_IP=$(ip address | awk -F' ' '/172.16.0/ {gsub("/24","", $2); print $2}')

    if [[ -z $VM_IP ]]
    then
        echo 'Não foi possível obter o IP do host com o comando "ip addr", abortando configuração'
        exit 1
    fi

    if [[ -f $HOSTS_KEYS ]]
    then
        # idempotência
        if grep -F -s $VM_IP $HOSTS_KEYS
        then
            echo "O endereço IP $VM_IP já existe no arquivo $HOSTS_KEYS, nada a ser feito"
        else
            echo "Adicionando a chave pública de $VM_IP ao arquivo $HOSTS_KEYS"
            echo "$VM_IP $(cat $HOST_PUB_KEY)" >> $HOSTS_KEYS
            echo "$HOSTNAME $(cat $HOST_PUB_KEY)" >> $HOSTS_KEYS
        fi
    else
        echo "Criando o arquivo $HOSTS_KEYS com a chave pública de $VM_IP"
        echo "$VM_IP $(cat $HOST_PUB_KEY)" > $HOSTS_KEYS
        echo "$HOSTNAME $(cat $HOST_PUB_KEY)" >> $HOSTS_KEYS
    fi
else
    echo 'O compartilhamento de arquivos via Vagrant ainda não está disponível'
fi

#!/bin/bash

# Installs Ansible using a Python virtual environment to avoiding problems with the host's Python setup

if [[ ! -d $HOME/.venv ]]
then
    python3 -m venv $HOME/.venv
    . $HOME/.venv/bin/activate && python -m pip install ansible

    cat << EOF >> "$HOME/.profile"

# Enabling Python virtualenv to get ansible working
if [ -d \$HOME/.venv ]
then
    PATH="\$HOME/.venv/bin:\$PATH"
fi
EOF
fi

ANSIBLE_GLOBAL_DIR=/etc/ansible
ANSIBLE_GLOBAL_CFG="$ANSIBLE_GLOBAL_DIR/ansible.cfg"

if [[ ! -d $ANSIBLE_GLOBAL_DIR ]]
then
    sudo mkdir $ANSIBLE_GLOBAL_DIR
    . $HOME/.venv/bin/activate && ansible-config init --disabled > ansible.cfg
    sudo mv ansible.cfg $ANSIBLE_GLOBAL_CFG
    sudo chown root:root $ANSIBLE_GLOBAL_CFG
fi

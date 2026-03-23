#!/bin/bash

VMS_ID=$PWD/known-vms.txt

alias ssh="ssh -o UserKnownHostsFile=$VMS_ID"
alias ssh-copy-id="ssh-copy-id -o UserKnownHostsFile=$VMS_ID"
alias scp="scp -o UserKnownHostsFile=$VMS_ID"

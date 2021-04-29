#!/bin/bash

sshpass ssh -T nodo1@192.168.43.227 <<EOF
echo "m3c02k19" | sudo -S apt update -y
cd ~
touch adios.txt
exit
EOF
#!/bin/bash

sshpass -p $1 ssh -T $2@$3 <<EOF
echo "$1" | sudo -S apt update -y
cd ~
touch prueba.txt
exit
EOF
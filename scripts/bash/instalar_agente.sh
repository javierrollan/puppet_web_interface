#!/bin/bash

ssh -T nodo1@192.168.43.227 <<EOF
sudo apt update -y
cd ~
touch hola.txt
exit
EOF
#!/bin/bash

#apt list --installed | awk -F'[/, ]' '{print $1 " " $2 " " $3 " " $4 " " $5}'
#touch prueba_script.txt
script="$4"

sshpass -p $1 ssh -T -o StrictHostKeyChecking=no $2@$3 <<EOF

echo "$1" | sudo -S $4


EOF
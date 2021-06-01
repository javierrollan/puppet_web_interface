#!/bin/bash

fecha=$(date +"%Y%m%d")

sshpass -p $1 ssh -T -o StrictHostKeyChecking=no $2@$3 <<EOF
cd ~
apt list --installed 2>&1 | sed '1,4d' | awk -F'[/, ]' '{print \$1 \$4}' > "$2_$fecha".txt
sshpass -p $1 scp -o StrictHostKeyChecking=no "$2_$fecha".txt javi@envy:~/inventario
exit
EOF

cd ~/inventario
mv "$2_$fecha".txt /var/www/proyecto/inventario

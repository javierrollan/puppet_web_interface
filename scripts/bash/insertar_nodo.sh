#!/bin/bash

echo "$1" | sudo -S sed -i "3i$3 	$2" /etc/hosts

sshpass -p $1 ssh -T -o StrictHostKeyChecking=no $2@$3 <<EOF

echo "$1" | sudo -S sed -i "3i192.168.2.124	envy puppet" /etc/hosts

echo "$1" | sudo -S sed -i "3i$3 	$2" /etc/hosts

exit
EOF

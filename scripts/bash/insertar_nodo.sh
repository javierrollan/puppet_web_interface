#!/bin/bash

echo "$1" | sudo -S sed -i "3i$2 	$3" /etc/hosts

sshpass -p $1 ssh -T -o StrictHostKeyChecking=no $2@$3 <<EOF

echo "$1" | sudo -S sed -i "3i192.168.1.50	puppetserver puppet" /etc/hosts

echo "$1" | sudo -S sed -i "3i$3 	$2" /etc/hosts

exit
EOF
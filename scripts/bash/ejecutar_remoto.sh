#!/bin/bash

script="$4"

sshpass -p $1 ssh -T -o StrictHostKeyChecking=no $2@$3 <<EOF

cd ~

echo "$1" | sudo -S $4

exit
EOF
#!/bin/bash

sshpass -p $1 ssh -T -o StrictHostKeyChecking=no $2@$3 <<EOF
cd ~
wget https://apt.puppet.com/puppet7-release-focal.deb
echo "$1" | sudo -S dpkg -i puppet7-release-focal.deb
echo "$1" | sudo -S apt update -y
echo "$1" | sudo -S apt-get install puppet-agent -y
echo "$1" | sudo -S systemctl enable puppet.service
echo "$1" | sudo -S systemctl start puppet.service
exit
EOF
#!/bin/bash

sudo su <<EOF
$2
cd /etc/puppetlabs/code/modules
pdk new module $3 --skip-interview
chown -R $1:$1 $3
EOF

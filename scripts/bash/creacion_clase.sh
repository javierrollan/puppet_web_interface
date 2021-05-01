#!/bin/bash

su - $1 <<EOF
$2
cd /etc/puppetlabs/code/modules/$3/manifests/
pdk new class $4
EOF

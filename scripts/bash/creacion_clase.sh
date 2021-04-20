#!/bin/bash

su - $1 <<EOF
$2
cd /var/www/proyecto/$3/manifests/
pdk new class $4
EOF

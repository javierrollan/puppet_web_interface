#!/bin/bash

su - $1 <<EOF
$2
cd /var/www/proyecto/
pdk new module $3 --skip-interview
EOF

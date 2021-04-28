#!/bin/bash

sudo su <<EOF
$1
sed -i "3i$2 	$3" /etc/hosts
EOF
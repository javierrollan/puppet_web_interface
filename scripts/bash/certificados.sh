#!/bin/bash

export PATH=/opt/puppetlabs/bin:$PATH 
puppetserver ca list --all | grep : | awk '{print $1" "$3}' > ../../certificados/certificados.txt

chown -R $USER:$USER ../../certificados/certificados.txt

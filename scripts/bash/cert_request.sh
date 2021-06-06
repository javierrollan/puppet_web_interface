#!/bin/bash

sha256sum /etc/puppetlabs/puppetserver/ca/requests/nodo1.pem | awk -F'[/.]' '{print $7" "$1}' > ../../certificados/cert_req.txt

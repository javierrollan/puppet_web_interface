#!/bin/bash

sha256sum /etc/puppetlabs/puppetserver/ca/signed/envy.pem | awk -F'[/.]' '{print $7" "$1}' > ../../certificados/cert_sign.txt

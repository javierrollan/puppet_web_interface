#!/bin/bash
echo " " > /var/www/proyecto/certificados/cert_sign.txt
sha256sum /etc/puppetlabs/puppetserver/ca/signed/*.pem | awk -F'[/.]' '{print $7" "$1}' >> /var/www/proyecto/certificados/cert_sign.txt
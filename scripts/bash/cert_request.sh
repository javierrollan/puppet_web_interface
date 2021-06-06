#!/bin/bash
echo " " > /var/www/proyecto/certificados/cert_req.txt
sha256sum /etc/puppetlabs/puppetserver/ca/requests/*.pem | awk -F'[/.]' '{print $7" "$1}' >> /var/www/proyecto/certificados/cert_req.txt

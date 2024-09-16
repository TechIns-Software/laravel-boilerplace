#!/usr/bin/env bash

ln -s /etc/nginx/sites-available/staging.conf /etc/nginx/sites-enabled/staging.conf
sudo -u www-data php /var/www/staging/artisan up

service nginx reload

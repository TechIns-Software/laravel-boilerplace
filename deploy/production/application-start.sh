#!/usr/bin/env bash

ln -s /etc/nginx/sites-available/production.conf /etc/nginx/sites-enabled/production.conf
sudo -u www-data php /var/www/production/artisan up

service nginx reload

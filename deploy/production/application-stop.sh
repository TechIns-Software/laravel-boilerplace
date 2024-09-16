#!/usr/bin/env bash

sudo -u www-data php /var/www/production/artisan down

rm -rf /etc/nginx/sites-enabled/production.conf
service nginx reload

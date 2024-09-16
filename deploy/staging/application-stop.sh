#!/usr/bin/env bash

sudo -u www-data php /var/www/staging/artisan down

rm -rf /etc/nginx/sites-enabled/staging.conf
service nginx reload

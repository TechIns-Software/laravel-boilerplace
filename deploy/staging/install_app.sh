#!/usr/bin/env bash

DIR=/var/www/staging

chown -R www-data:www-data $DIR

sudo -u www-data php $DIR/artisan migrate
sudo -u www-data php $DIR/artisan config:clear
sudo -u www-data php $DIR/artisan cache:clear
sudo -u www-data php $DIR/artisan route:clear
sudo -u www-data php $DIR/artisan optimize

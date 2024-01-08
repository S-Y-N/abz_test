#!/bin/sh

composer install

php artisan key:generate

mkdir -p storage/framework/cache/data
mkdir -p storage/framework/sessions
mkdir -p storage/framework/testing
mkdir -p storage/framework/views
mkdir -p storage/framework/logs

rm storage/framework/logs/*
rm bootstrap/cache/*.php

php artisan cache:clear
php artisan config:clear
php artisan optimize:clear
php artisan route:clear
php artisan route:cache

php artisan migrate
php artisan passport:install
php artisan db:seed
php artisan storage:link

php-fpm -y /usr/local/etc/php-fpm.conf -R
#!/bin/sh
rm -rf /app/composer.lock
composer install

cp /app/.env.example /app/.env
php /app/artisan key:generate

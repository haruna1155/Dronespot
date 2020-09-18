#!/bin/sh
composer install

cd /app
cp .env.example .env
php artisan key:generate
